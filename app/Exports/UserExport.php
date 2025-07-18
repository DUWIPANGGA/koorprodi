<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Events\AfterSheet;

class UserExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{
    public function collection()
    {
        return User::orderBy('prodi')
                 ->orderBy('semester')
                 ->orderBy('nim')
                 ->get();
    }

    public function headings(): array
    {
        return [
            'NIM',
            'NAMA',
            'PROGRAM STUDI',
            'SEMESTER',
            'ALAMAT',
            'ASAL SEKOLAH',
            'HOBI',
            'BAKAT',
            'KELAS',
            'ANGKATAN',
            'PELAPORAN IPK',
            'JENIS KELAMIN',
            'NO. HP',
            'NO. HP WALI',
            'EMAIL',
            'ROLE'
        ];
    }

    public function map($user): array
    {
        return [
            $user->nim,
            $user->name,
            $user->prodi,
            $user->semester,
            $user->alamat,
            $user->asal_sekolah,
            $user->hobi,
            $user->bakat,
            $user->kelas,
            $user->angkatan,
            $user->pelaporan_ipk,
            $user->gender,
            $user->phone,
            $user->phone_wali,
            $user->email,
            $user->role
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set default font
        $sheet->getStyle('A:P')->getFont()->setName('Arial');
        
        // Header style
        $sheet->getStyle('A1:P1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => Color::COLOR_WHITE]
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4472C4'] // Blue header
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => Color::COLOR_BLACK]
                ]
            ],
            'alignment' => [
                'wrapText' => true,
                'vertical' => 'center'
            ]
        ]);
        
        // Set column widths
        $sheet->getColumnDimension('A')->setWidth(15); // NIM
        $sheet->getColumnDimension('B')->setWidth(30); // NAMA
        $sheet->getColumnDimension('C')->setWidth(25); // PRODI
        $sheet->getColumnDimension('D')->setWidth(12); // SEMESTER
        $sheet->getColumnDimension('E')->setWidth(40); // ALAMAT
        $sheet->getColumnDimension('F')->setWidth(25); // ASAL SEKOLAH
        $sheet->getColumnDimension('G')->setWidth(20); // HOBI
        $sheet->getColumnDimension('H')->setWidth(20); // BAKAT
        $sheet->getColumnDimension('I')->setWidth(15); // KELAS
        $sheet->getColumnDimension('J')->setWidth(12); // ANGKATAN
        $sheet->getColumnDimension('K')->setWidth(15); // PELAPORAN IPK
        $sheet->getColumnDimension('L')->setWidth(15); // GENDER
        $sheet->getColumnDimension('M')->setWidth(15); // PHONE
        $sheet->getColumnDimension('N')->setWidth(15); // PHONE WALI
        $sheet->getColumnDimension('O')->setWidth(30); // EMAIL
        $sheet->getColumnDimension('P')->setWidth(15); // ROLE
        
        // Enable text wrapping for long text
        $sheet->getStyle('E:E')->getAlignment()->setWrapText(true);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();
                $currentProdi = null;
                
                // Apply grouping and styling
                for ($row = 2; $row <= $highestRow; $row++) {
                    $prodi = $sheet->getCell('C'.$row)->getValue();
                    
                    // Add group separator when prodi changes
                    if ($prodi != $currentProdi) {
                        if ($currentProdi !== null) {
                            // Insert blank row with colored border
                            $sheet->insertNewRowBefore($row, 1);
                            $sheet->mergeCells('A'.$row.':P'.$row);
                            $sheet->getStyle('A'.$row.':P'.$row)
                                ->getFill()
                                ->setFillType(Fill::FILL_SOLID)
                                ->getStartColor()
                                ->setARGB('D9D9D9'); // Gray separator
                            
                            $highestRow++; // Increase total rows after insertion
                            $row++; // Skip the newly added row
                        }
                        $currentProdi = $prodi;
                    }
                    
                    // Add borders to all cells
                    $sheet->getStyle('A'.$row.':P'.$row)
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle(Border::BORDER_THIN);
                }
                
                // Add title
                $sheet->insertNewRowBefore(1, 2);
                $sheet->mergeCells('A1:P1');
                $sheet->setCellValue('A1', 'DATA MAHASISWA');
                $sheet->getStyle('A1:P1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                        'color' => ['rgb' => Color::COLOR_WHITE]
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '70AD47'] // Dark green
                    ],
                    'alignment' => [
                        'horizontal' => 'center',
                        'vertical' => 'center'
                    ]
                ]);
                
                // Move headers to row 3
                $sheet->getStyle('A3:P3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => Color::COLOR_WHITE]
                    ],
                    'fill' => [
                        'fillType' => Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '4472C4'] // Blue header
                    ]
                ]);
            }
        ];
    }
}