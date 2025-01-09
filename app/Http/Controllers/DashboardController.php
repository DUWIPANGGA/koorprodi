<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function getSemester($angkatan)
    {
        $currentYear = now()->year; // Mendapatkan tahun saat ini
        $currentMonth = now()->month; // Mendapatkan bulan saat ini

        // Jika tahun angkatan kurang dari atau sama dengan tahun sekarang, kita bisa menghitung semester
        // Angkatan 2024 mulai semester 1, angkatan 2025 mulai semester 1, dan seterusnya.
        $yearDiff = $currentYear - $angkatan;
        $semester = ($yearDiff * 2) - 1;
        if ($currentMonth > 6) {
            $semester += 1; // Semester 2 jika sudah lewat bulan Juni
        }

        return $semester;
    }
    public function dashboard()
    {
        $user = Auth::user();
        $rekaps = Rekap::where('user_id', $user->id)
    ->whereBetween('semester', [1, 8])
    ->orderBy('semester', 'asc')
    ->get();
    $ipkArray = array_fill(0, 8, 0);
$ipkNew = count($rekaps) > 0 ? $rekaps[count($rekaps)-1] : null; 
   // dd($ipkNew);
    $semester = $user->angkatan > 0 ? $this->getSemester($user->angkatan) : 1;
    // dd($semester);
    
    foreach ($rekaps as $rekap) {
        $ipkArray[$rekap->semester - 1] = $rekap->IPK; 
    }
    // dd($ipkArray);
        return view('public.dashboard', compact('user','rekaps','ipkArray','ipkNew','semester'));
    }
}
