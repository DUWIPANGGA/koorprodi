<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RekapController extends Controller
{

    /**
     * Menampilkan rekap berdasarkan pelaporan IPK
     */
    public function rekapIpk()
    {
        $users = User::whereNotNull('pelaporan_ipk')
                    ->orderBy('prodi')
                    ->orderBy('semester')
                    ->orderBy('name')
                    ->paginate(20);

        // Group by prodi untuk statistik
        $statistik = User::whereNotNull('pelaporan_ipk')
                        ->selectRaw('prodi, count(*) as total, avg(pelaporan_ipk) as rata_rata')
                        ->groupBy('prodi')
                        ->get();

        return view('admin.rekap.ipk', compact('users', 'statistik'));
    }

    /**
     * Update semester semua mahasiswa
     */
    public function updateSemesterMassal(Request $request)
    {
        $request->validate([
            'action' => 'required|in:increment,decrement,reset'
        ]);

        $action = $request->action;
        $affected = 0;

        switch ($action) {
            case 'increment':
                $affected = User::where('semester', '<', 14)->where('semester', '>', 0)
                              ->increment('semester');
                $message = "Semester semua mahasiswa berhasil dinaikkan";
                break;
                
            case 'decrement':
                $affected = User::where('semester', '>', 1)->where('semester', '<', 14)
                              ->decrement('semester');
                $message = "Semester semua mahasiswa berhasil diturunkan";
                break;
                
            // case 'reset':
            //     $affected = User::where('semester', '>', 1)
            //                   ->update(['semester' => 1]);
            //     $message = "Semester semua mahasiswa direset ke 1";
            //     break;
        }

        return redirect()->back()
            ->with('success', $message . " ($affected mahasiswa terupdate)");
    }

    /**
     * Export data rekap IPK
     */
    public function exportRekapIpk()
    {
        $users = User::whereNotNull('pelaporan_ipk')
                    ->orderBy('prodi')
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