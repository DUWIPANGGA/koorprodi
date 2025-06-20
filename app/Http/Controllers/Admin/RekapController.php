<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    /**
     * Menampilkan rekap berdasarkan pelaporan IPK dengan filter
     */
    public function rekapIpk(Request $request)
    {
        $query = User::whereNotNull('pelaporan_ipk');

        // Filter by prodi jika ada
        if ($request->has('prodi') && $request->prodi != 'all') {
            $query->where('prodi', $request->prodi);
        }

        // Filter by angkatan jika ada
        if ($request->has('angkatan') && $request->angkatan != 'all') {
            $query->where('angkatan', $request->angkatan);
        }

        $users = $query->orderBy('prodi')
                      ->orderBy('semester')
                      ->orderBy('name')
                      ->paginate(20)
                      ->appends($request->query());

        // Group by prodi untuk statistik
        $statistik = User::whereNotNull('pelaporan_ipk')
                        ->selectRaw('prodi, count(*) as total, avg(pelaporan_ipk) as rata_rata')
                        ->groupBy('prodi')
                        ->get();

        // Get distinct prodies for filter dropdown
        $prodies = User::select('prodi')
                      ->distinct()
                      ->orderBy('prodi')
                      ->pluck('prodi');

        // Get distinct angkatan for filter dropdown
        $angkatans = User::select('angkatan')
                        ->distinct()
                        ->orderBy('angkatan', 'desc')
                        ->pluck('angkatan');

        return view('admin.rekap.ipk', compact('users', 'statistik', 'prodies', 'angkatans'));
    }

    /**
     * Update semester semua mahasiswa dengan filter
     */
    public function updateSemesterMassal(Request $request)
    {
        $request->validate([
            'action' => 'required|in:increment,decrement',
            'prodi' => 'nullable|string',
            'angkatan' => 'nullable|integer'
        ]);

        $query = User::query();

        // Filter by prodi jika ada
        if ($request->filled('prodi') && $request->prodi != 'all') {
            $query->where('prodi', $request->prodi);
        }

        // Filter by angkatan jika ada
        if ($request->filled('angkatan') && $request->angkatan != 'all') {
            $query->where('angkatan', $request->angkatan);
        }

        $action = $request->action;
        $affected = 0;

        switch ($action) {
            case 'increment':
                $affected = $query->where('semester', '<', 14)
                                ->where('semester', '>', 0)
                                ->increment('semester');
                $message = "Semester mahasiswa berhasil dinaikkan";
                break;
                
            case 'decrement':
                $affected = $query->where('semester', '>', 1)
                                ->where('semester', '<', 14)
                                ->decrement('semester');
                $message = "Semester mahasiswa berhasil diturunkan";
                break;
        }

        // Tambahkan info filter dalam pesan
        $filterInfo = [];
        if ($request->filled('prodi') && $request->prodi != 'all') {
            $filterInfo[] = "Prodi: {$request->prodi}";
        }
        if ($request->filled('angkatan') && $request->angkatan != 'all') {
            $filterInfo[] = "Angkatan: {$request->angkatan}";
        }

        if (!empty($filterInfo)) {
            $message .= " (" . implode(', ', $filterInfo) . ")";
        }

        return redirect()->back()
            ->with('success', $message . " ($affected mahasiswa terupdate)");
    }

    /**
     * Export data rekap IPK dengan filter
     */
    public function exportRekapIpk(Request $request)
    {
        $query = User::whereNotNull('pelaporan_ipk');

        // Filter by prodi jika ada
        if ($request->has('prodi') && $request->prodi != 'all') {
            $query->where('prodi', $request->prodi);
        }

        // Filter by angkatan jika ada
        if ($request->has('angkatan') && $request->angkatan != 'all') {
            $query->where('angkatan', $request->angkatan);
        }

        $users = $query->orderBy('prodi')
                      ->orderBy('semester')
                      ->orderBy('name')
                      ->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="rekap_ipk_' . date('Ymd') . '.csv"',
        ];

        $callback = function() use ($users) {
            $file = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($file, [
                'NIM', 'Nama', 'Prodi', 'Semester', 'IPK', 
                'Kelas', 'Angkatan', 'No. HP', 'Email'
            ]);

            // Data
            foreach ($users as $user) {
                fputcsv($file, [
                    $user->nim,
                    $user->name,
                    $user->prodi,
                    $user->semester,
                    $user->pelaporan_ipk,
                    $user->kelas,
                    $user->angkatan,
                    $user->phone,
                    $user->email
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}