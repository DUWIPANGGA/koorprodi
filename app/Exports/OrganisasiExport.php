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
        return $this->users->sortByDesc(function($user) {
            return $user->organisasis->where('pivot.semester', $user->semester)->count() > 0;
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'NIM', 
            'Prodi',
            'Semester',
            'Organisasi dan Jabatan',  // Combined column
            'Status Pengumpulan'
        ];
    }

    public function map($user): array
    {
        // Get organizations with their positions
        $orgDetails = [];
        foreach ($user->organisasis->where('pivot.semester', $user->semester) as $org) {
            $orgDetails[] = $org->nama_organisasi . ' - ' . $org->pivot->jabatan;
        }

        $orgString = $orgDetails ? implode("\n", $orgDetails) : '-';
        $status = $orgDetails ? 'Sudah Mengumpulkan' : 'Belum Mengumpulkan';

        return [
            '', // Will be filled with row number in styles
            $user->name,
            "'" . $user->nim,
            $user->prodi,
            $user->semester,
            $orgString,
            $status
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Header styling
        $sheet->getStyle('A1:G1')->applyFromArray([
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
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true
            ]
        ]);

        // Set column widths
        $sheet->getColumnDimension('A')->setWidth(5);  // No
        $sheet->getColumnDimension('B')->setWidth(30); // Nama
        $sheet->getColumnDimension('C')->setWidth(15); // NIM
        $sheet->getColumnDimension('D')->setWidth(20); // Prodi
        $sheet->getColumnDimension('E')->setWidth(10); // Semester
        $sheet->getColumnDimension('F')->setWidth(40); // Organisasi & Jabatan
        $sheet->getColumnDimension('G')->setWidth(20); // Status

        // Apply styles to data rows
        $lastRow = $sheet->getHighestRow();
        
        // Add row numbers
        for ($i = 2; $i <= $lastRow; $i++) {
            $sheet->setCellValue('A'.$i, $i-1);
        }

        // Style for all data cells
        $sheet->getStyle('A2:G'.$lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'DDDDDD']
                ]
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_TOP,
                'wrapText' => true
            ]
        ]);

        // Center align for number, NIM, semester, and status
        $sheet->getStyle('A2:A'.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('C2:C'.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('E2:E'.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('G2:G'.$lastRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Conditional formatting for status
        for ($row = 2; $row <= $lastRow; $row++) {
            $statusCell = $sheet->getCell('G'.$row)->getValue();
            
            if ($statusCell === 'Sudah Mengumpulkan') {
                $sheet->getStyle('G'.$row)->applyFromArray([
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'C6EFCE']
                    ],
                    'font' => [
                        'color' => ['rgb' => '006100']
                    ]
                ]);
            } else {
                $sheet->getStyle('G'.$row)->applyFromArray([
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
            $statusCell = $sheet->getCell('G'.$row)->getValue();
            
            if ($statusCell === 'Belum Mengumpulkan' && !$foundFirstNotSubmitted) {
                $foundFirstNotSubmitted = true;
                
                // Insert a separator row
                $sheet->insertNewRowBefore($row, 1);
                $sheet->mergeCells('A'.$row.':G'.$row);
                $sheet->setCellValue('A'.$row, 'BELUM MENGUMPULKAN ORGANISASI');
                $sheet->getStyle('A'.$row.':G'.$row)->applyFromArray([
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
                
                $row++;
                $lastRow++;
            }
        }

        // Freeze header row
        $sheet->freezePane('A2');

        // Set row height for organization details
        for ($row = 2; $row <= $lastRow; $row++) {
            $orgCell = $sheet->getCell('F'.$row);
            if (strpos($orgCell->getValue(), "\n") !== false) {
                $lineCount = substr_count($orgCell->getValue(), "\n") + 1;
                $sheet->getRowDimension($row)->setRowHeight(15 * $lineCount);
            }
        }

        return [];
    }
}