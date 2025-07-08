<?php

namespace App\Exports;

use App\Models\Aspirasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AspirasiExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize, WithMapping
{
    private $nomorBaris = 0;

    public function collection()
    {
        return Aspirasi::select('nama', 'isi', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Isi Aspirasi',
            'Tanggal'
        ];
    }

    public function map($aspirasi): array
    {
        $this->nomorBaris++;
        return [
            $this->nomorBaris,
            $aspirasi->nama,
            $aspirasi->isi,
            $aspirasi->created_at->format('d M Y')
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => '4285F4',
                    ],
                ],
            ],
        ];
    }
}
