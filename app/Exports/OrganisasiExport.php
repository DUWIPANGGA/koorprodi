<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class OrganisasiExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function collection()
    {
        // Separate users who have submitted organizations and those who haven't
        return $this->users->sortByDesc(function($user) {
            return $user->organisasis->where('pivot.semester', $user->semester)->count() > 0;
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NIM', 
            'Prodi',
            'Semester',
            'Organisasi',
            'Status Pengumpulan'
        ];
    }

    public function map($user): array
    {
        // Get organizations for the user's current semester
        $organizations = $user->organisasis
            ->where('pivot.semester', $user->semester)
            ->pluck('nama_organisasi')
            ->implode(', ');

        $status = $organizations ? 'Sudah Mengumpulkan' : 'Belum Mengumpulkan';

        return [
            $user->name,
            "'" . $user->nim, // Prepend with ' to preserve leading zeros in NIM
            $user->prodi,
            $user->semester,
            $organizations ?: '-',
            $status
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header styling
        $sheet->getStyle('A1:F1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF']
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4F81BD']
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000']
                ]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER
            ]
        ]);

        // Set column widths
        $sheet->getColumnDimension('A')->setWidth(30); // Nama
        $sheet->getColumnDimension('B')->setWidth(15); // NIM
        $sheet->getColumnDimension('C')->setWidth(20); // Prodi
        $sheet->getColumnDimension('D')->setWidth(10); // Semester
        $sheet->getColumnDimension('E')->setWidth(40); // Organisasi
        $sheet->getColumnDimension('F')->setWidth(20); // Status

        // Apply styles to data rows
        $lastRow = $sheet->getHighestRow();
        
        // Style for all data cells
        $sheet->getStyle('A2:F'.$lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'DDDDDD']
                ]
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER
            ]
        ]);

        // Conditional formatting for status
        for ($row = 2; $row <= $lastRow; $row++) {
            $statusCell = $sheet->getCell('F'.$row)->getValue();
            
            if ($statusCell === 'Sudah Mengumpulkan') {
                $sheet->getStyle('F'.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'C6EFCE']
                    ],
                    'font' => [
                        'color' => ['rgb' => '006100']
                    ]
                ]);
            } else {
                $sheet->getStyle('F'.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FFC7CE']
                    ],
                    'font' => [
                        'color' => ['rgb' => '9C0006']
                    ]
                ]);
            }
        }

        // Add separator between submitted and not submitted
        $foundFirstNotSubmitted = false;
        for ($row = 2; $row <= $lastRow; $row++) {
            $statusCell = $sheet->getCell('F'.$row)->getValue();
            
            if ($statusCell === 'Belum Mengumpulkan' && !$foundFirstNotSubmitted) {
                $foundFirstNotSubmitted = true;
                
                // Insert a separator row
                $sheet->insertNewRowBefore($row, 1);
                $sheet->mergeCells('A'.$row.':F'.$row);
                $sheet->setCellValue('A'.$row, 'BELUM MENGUMPULKAN ORGANISASI');
                $sheet->getStyle('A'.$row.':F'.$row)->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FFFFFF']
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FF0000']
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ]
                ]);
                
                // Adjust row counter since we added a row
                $row++;
                $lastRow++;
            }
        }

        // Freeze header row
        $sheet->freezePane('A2');

        return [];
    }
}