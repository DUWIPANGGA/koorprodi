<?php

// app/Http/Controllers/UserOrganisasiController.php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use App\Exports\OrganisasiExport;
use Maatwebsite\Excel\Facades\Excel;

class UserOrganisasiController extends Controller
{
    // app/Http/Controllers/UserOrganisasiController.php
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
        $user = User::findOrFail($user_id);
        $organisasis = Organisasi::all();
        $currentSemester = $user->semester;
        
        return view('user-organisasi.create', compact('user', 'organisasis', 'currentSemester'));
    }

    public function store(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        
        $request->validate([
            'organisasi_ids' => 'required|array',
            'organisasi_ids.*' => 'exists:organisasis,id',
            'semester' => 'required|string',
        ]);

        // Hapus dulu organisasi di semester yang sama
        $user->organisasis()
            ->wherePivot('semester', $request->semester)
            ->detach();

        // Tambahkan organisasi baru
        $user->organisasis()->attach($request->organisasi_ids, [
            'semester' => $request->semester
        ]);

        return redirect()->route('profile.show')
            ->with('success', 'Organisasi berhasil diperbarui untuk semester ini');
    }

    public function edit($user_id, $semester)
    {
        $user = User::with(['organisasis' => function($query) use ($semester) {
            $query->wherePivot('semester', $semester);
        }])->findOrFail($user_id);

        $organisasis = Organisasi::all();
        
        return view('user-organisasi.edit', compact('user', 'organisasis', 'semester'));
    }

    private function getCurrentSemester()
    {
        $year = date('Y');
        $month = date('n');
        $semester = ($month >= 2 && $month <= 7) ? 'genap' : 'ganjil';
        return $year .' '. $semester;
    }
}