<?php

namespace App\Exports;

use App\Models\Rekap;
use Maatwebsite\Excel\Concerns\FromCollection;

class RekapExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Rekap::join('users', 'rekap.user_id', '=', 'users.id')
        ->select('users.nim', 'users.name', 'users.semester', 'rekap.IPK')
        ->where('rekap.validated', 1)
        ->orderBy('users.semester')
        ->orderBy('users.nim')
        ->get();
    
    
        
    }
    public function headings(): array
    {
        return [
            'NIM',
            'NAME',
            'Semester',
            'IPK',
        ];
    }
}
