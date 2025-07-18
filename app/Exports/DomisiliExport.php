<?php

namespace App\Exports;

use App\Models\Domisili;
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

class DomisiliExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{
    public function collection()
    {
        return Domisili::with(['mahasiswa', 'fotos'])
            ->join('users', 'domisili.mahasiswa_id', '=', 'users.id')
            ->select('domisili.*', 'users.prodi', 'users.semester')
            ->where('domisili.status', 'approved') // Only approved records
            ->orderBy('users.prodi')
            ->orderBy('users.semester')
            ->orderBy('users.nim')
            ->get();
    }

    public function headings(): array
    {
        return [
            'PROGRAM STUDI',
            'SEMESTER',
            'NIM',
            'NAMA MAHASISWA',
            'ALAMAT LENGKAP',
            'LATITUDE',
            'LONGITUDE',
            'TANGGAL DISETUJUI',
            'FOTO DOMISILI'
        ];
    }

    public function map($domisili): array
    {
        $fotoLinks = $domisili->fotos->map(function($foto) {
            return asset('storage/' . $foto->path);
        })->implode("\n");

        return [
            $domisili->prodi,
            $domisili->semester,
            $domisili->mahasiswa->nim ?? '',
            $domisili->mahasiswa->name,
            $domisili->alamat_lengkap,
            $domisili->latitude,
            $domisili->longitude,
            $domisili->updated_at->format('d/m/Y H:i'), // Use approval date
            $fotoLinks
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set default font
        $sheet->getStyle('A:I')->getFont()->setName('Arial');
        
        // Header style
        $sheet->getStyle('A1:I1')->applyFromArray([
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
        $sheet->getColumnDimension('A')->setWidth(25); // Prodi
        $sheet->getColumnDimension('B')->setWidth(12); // Semester
        $sheet->getColumnDimension('C')->setWidth(15); // NIM
        $sheet->getColumnDimension('D')->setWidth(30); // Nama
        $sheet->getColumnDimension('E')->setWidth(40); // Alamat
        $sheet->getColumnDimension('F')->setWidth(15); // Latitude
        $sheet->getColumnDimension('G')->setWidth(15); // Longitude
        $sheet->getColumnDimension('H')->setWidth(20); // Tanggal
        $sheet->getColumnDimension('I')->setWidth(40); // Foto
        
        // Enable text wrapping for address and photos
        $sheet->getStyle('E:I')->getAlignment()->setWrapText(true);
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
                    $prodi = $sheet->getCell('A'.$row)->getValue();
                    
                    // Add group separator when prodi changes
                    if ($prodi != $currentProdi) {
                        if ($currentProdi !== null) {
                            // Insert blank row with colored border
                            $sheet->insertNewRowBefore($row, 1);
                            $sheet->mergeCells('A'.$row.':I'.$row);
                            $sheet->getStyle('A'.$row.':I'.$row)
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
                    $sheet->getStyle('A'.$row.':I'.$row)
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle(Border::BORDER_THIN);
                        
                    // Light green background for all approved records
                    $sheet->getStyle('A'.$row.':I'.$row)
                        ->getFill()
                        ->setFillType(Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('C6EFCE'); // Light green
                }
                
                // Add title for approved data
                $sheet->insertNewRowBefore(1, 2);
                $sheet->mergeCells('A1:I1');
                $sheet->setCellValue('A1', 'DATA DOMISILI YANG DISETUJUI');
                $sheet->getStyle('A1:I1')->applyFromArray([
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
                $sheet->getStyle('A3:I3')->applyFromArray([
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