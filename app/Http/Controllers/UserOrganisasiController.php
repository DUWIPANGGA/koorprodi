<?php

// app/Http/Controllers/UserOrganisasiController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use App\Exports\OrganisasiExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class UserOrganisasiController extends Controller
{
public function show($user_id)
{
    $user = User::with(['organisasis' => function($query) {
        $query->withPivot('semester', 'jabatan');
    }, 'laporanOrganisasi'])->findOrFail($user_id);

    return view('user-organisasi.show', compact('user'));
}

    public function index(Request $request)
{
    $query = User::with(['organisasis', 'laporanOrganisasi' => function($q) {
        $q->where('semester', auth()->user()->semester);
    }])->latest();
    
    // Filter organisasi
    if ($request->organisasi) {
        $query->whereHas('organisasis', function($q) use ($request) {
            $q->where('organisasi_id', $request->organisasi);
        });
    }
    
    // Filter semester
    if ($request->semester) {
        $query->whereHas('organisasis', function($q) use ($request) {
            $q->where('semester', $request->semester);
        });
    }
    
    // Filter prodi
    if ($request->prodi) {
        $query->where('prodi', $request->prodi);
    }
    
    // Filter belum mengumpulkan laporan
    if ($request->has('belum_mengumpulkan')) {
        $currentSemester = auth()->user()->semester;
        $query->whereDoesntHave('laporanOrganisasi', function($q) use ($currentSemester) {
            $q->where('semester', $currentSemester);
        });
    }
    
    $users = $query->paginate(10);
    
    $allOrganisasis = Organisasi::all();
    $uniqueSemesters = User::select('semester')->distinct()->pluck('semester');
    $uniqueProdis = User::select('prodi')->distinct()->whereNotNull('prodi')->pluck('prodi');
    
    return view('user-organisasi.index', compact('users', 'allOrganisasis', 'uniqueSemesters', 'uniqueProdis'));
}

public function export(Request $request)
{
    $users = User::with(['organisasis', 'laporanOrganisasi'])
        ->when($request->organisasi, function($q) use ($request) {
            $q->whereHas('organisasis', function($q) use ($request) {
                $q->where('organisasi_id', $request->organisasi);
            });
        })
        ->when($request->semester, function($q) use ($request) {
            $q->whereHas('organisasis', function($q) use ($request) {
                $q->where('semester', $request->semester);
            });
        })
        ->when($request->prodi, function($q) use ($request) {
            $q->where('prodi', $request->prodi);
        })
        ->when($request->has('belum_mengumpulkan'), function($q) {
            $currentSemester = auth()->user()->semester;
            $q->whereDoesntHave('laporanOrganisasi', function($q) use ($currentSemester) {
                $q->where('semester', $currentSemester);
            });
        })
        ->latest()
        ->get();    

    $fileName = 'anggota_organisasi_' . date('YmdHis') . '.xlsx';
    
    return Excel::download(new OrganisasiExport($users), $fileName);
}

   public function create($user_id)
{
    try {
        if (Auth::user()->id == $user_id) {
            $user = Auth::user();
        } elseif (in_array(Auth::user()->role, ['admin', 'super_admin'])) {
            $user = User::findOrFail($user_id);
        } else {
            return abort(403, 'Unauthorized action.');
        }

        $organisasis = Organisasi::all();
        $currentSemester = $user->semester;

        return view('user-organisasi.create', compact('user', 'organisasis', 'currentSemester'));
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()->withErrors(['user' => 'User tidak ditemukan.']);
    } catch (\Exception $e) {
        \Log::error('Gagal membuka halaman create organisasi: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat membuka halaman.']);
    }
}

public function store(Request $request, $user_id)
{
    try {
        if (Auth::user()->id == $user_id) {
            $user = Auth::user();
        } elseif (in_array(Auth::user()->role, ['admin', 'super_admin'])) {
            $user = User::findOrFail($user_id);
        } else {
            return abort(403, 'Unauthorized action.');
        }

        // Validasi request
        $request->validate([
            'organisasi_ids' => 'required|array|min:1',
            'organisasi_ids.*' => 'exists:organisasis,id',
            'semester' => 'required|string',
        ]);

        // Validasi manual untuk jabatan
        $errors = [];
        foreach ($request->organisasi_ids as $organisasi_id) {
            if (empty($request->jabatan[$organisasi_id])) {
                $errors["jabatan.$organisasi_id"] = 'Jabatan harus diisi';
            }
        }

        if (!empty($errors)) {
            return back()->withErrors($errors)->withInput();
        }

        // Prepare data for sync
        $organisasiData = [];
        foreach ($request->organisasi_ids as $organisasi_id) {
            $organisasiData[$organisasi_id] = [
                'semester' => $request->semester,
                'jabatan' => $request->jabatan[$organisasi_id]
            ];
        }

        // Sync data
        $user->organisasis()
            ->wherePivot('semester', $request->semester)
            ->sync($organisasiData);

        return redirect()->route('profile.show')
            ->with('success', 'Organisasi berhasil diperbarui untuk semester ini');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()->withErrors(['user' => 'User tidak ditemukan.']);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('Gagal menyimpan data organisasi: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.'])->withInput();
    }
}
public function update(Request $request, $user_id)
{
    try {
        // Authorization check
        if (Auth::user()->id != $user_id && !in_array(Auth::user()->role, ['admin', 'super_admin'])) {
            return abort(403, 'Unauthorized action.');
        }

        $user = User::findOrFail($user_id);
        $currentSemester = $request->input('semester');

        // Validate request
        $request->validate([
            'organisasi_ids' => 'required|array|min:1',
            'organisasi_ids.*' => 'exists:organisasis,id',
            'semester' => 'required|string',
        ]);

        // Additional validation for positions
        $errors = [];
        foreach ($request->organisasi_ids as $organisasi_id) {
            if (empty($request->jabatan[$organisasi_id])) {
                $errors["jabatan.$organisasi_id"] = 'Jabatan harus diisi untuk organisasi yang dipilih';
            }
        }

        if (!empty($errors)) {
            return back()
                ->withErrors($errors)
                ->withInput()
                ->with('error', 'Terdapat kesalahan dalam pengisian form');
        }

        // Prepare data for sync
        $organisasiData = [];
        foreach ($request->organisasi_ids as $organisasi_id) {
            $organisasiData[$organisasi_id] = [
                'semester' => $currentSemester,
                'jabatan' => $request->jabatan[$organisasi_id]
            ];
        }

        // Sync organizations for the specific semester
        $user->organisasis()
            ->wherePivot('semester', $currentSemester)
            ->sync($organisasiData);

        // Redirect based on user role
        $redirectRoute = in_array(Auth::user()->role, ['admin', 'super_admin']) 
            ? route('user-organisasi.index') 
            : route('profile.show');

        return redirect($redirectRoute)
            ->with('success', 'Keaktifan organisasi berhasil diperbarui untuk semester ' . $currentSemester);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->back()
            ->with('error', 'User tidak ditemukan')
            ->withInput();
            
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()
            ->withErrors($e->errors())
            ->withInput()
            ->with('error', 'Validasi gagal');
            
    } catch (\Exception $e) {
        \Log::error('Error updating user organizations: ' . $e->getMessage() . "\n" . $e->getTraceAsString());
        
        return redirect()->back()
            ->with('error', 'Terjadi kesalahan server: ' . $e->getMessage())
            ->withInput();
    }
}
    public function edit($user_id, $semester)
{
    $user = User::with(['organisasis' => function($query) use ($semester) {
        $query->wherePivot('semester', $semester);
    }])->findOrFail($user_id);

    $organisasis = Organisasi::all();

    // Ambil ID organisasi yang sudah dipilih user di semester ini
    $selectedOrganisasiIds = $user->organisasis->pluck('id')->toArray();

    // Ambil data pivot (jabatan) untuk tiap organisasi
    $selectedOrganisasi = [];
    foreach ($user->organisasis as $organisasi) {
        $selectedOrganisasi[$organisasi->id] = (object)[
            'jabatan' => $organisasi->pivot->jabatan,
        ];
    }

    return view('user-organisasi.edit', compact(
        'user',
        'organisasis',
        'semester',
        'selectedOrganisasiIds',
        'selectedOrganisasi'
    ));
}


    private function getCurrentSemester()
    {
        $year = date('Y');
        $month = date('n');
        $semester = ($month >= 2 && $month <= 7) ? 'genap' : 'ganjil';
        return $year .' '. $semester;
    }
}