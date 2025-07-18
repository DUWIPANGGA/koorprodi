<?php

namespace App\Exports;

use App\Models\Rekap;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;

class RekapExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
{
    protected $currentProdi = null;
    protected $currentSemester = null;
    protected $rowNumber = 2; // Start from row 2 (after header)
    
    public function collection()
    {
        return Rekap::join('users', 'rekap.user_id', '=', 'users.id')
            ->select('users.nim', 'users.name', 'users.prodi', 'users.semester', 'rekap.IPK')
            ->where('rekap.validated', 1)
            ->whereColumn('users.semester', 'rekap.semester')
            ->orderBy('users.prodi')
            ->orderBy('users.semester')
            ->orderBy('users.nim')
            ->get();
    }
    
    public function headings(): array
    {
        return [
            'NIM',
            'NAMA MAHASISWA',
            'PROGRAM STUDI',
            'SEMESTER',
            'IPK',
            'KETERANGAN (IPK < 3.0)'
        ];
    }
    
    public function map($rekap): array
    {
        $note = $rekap->IPK < 3.0 ? 'IPK DIBAWAH 3.0' : '';
        
        return [
            $rekap->nim,
            $rekap->name,
            $rekap->prodi,
            $rekap->semester,
            $rekap->IPK,
            $note
        ];
    }
    
    public function styles(Worksheet $sheet)
    {
        // Set default font and alignment
        $sheet->getStyle('A:F')->getFont()->setName('Arial');
        $sheet->getStyle('A:F')->getAlignment()->setHorizontal('center');
        
        // Header style
        $sheet->getStyle('A1:F1')->applyFromArray([
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
            ]
        ]);
        
        // Auto-size columns
        foreach(range('A','F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
    }
    
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $data = $this->collection();
                $lastRow = $data->count() + 1;
                
                // Group by prodi and semester
                $currentProdi = null;
                $currentSemester = null;
                $groupStartRow = 2;
                
                for ($i = 2; $i <= $lastRow; $i++) {
                    $prodi = $sheet->getCell('C'.$i)->getValue();
                    $semester = $sheet->getCell('D'.$i)->getValue();
                    $ipk = $sheet->getCell('E'.$i)->getValue();
                    
                    // Highlight IPK < 3.0
                    if ($ipk < 3.0) {
                        $sheet->getStyle('A'.$i.':F'.$i)
                            ->getFill()
                            ->setFillType(Fill::FILL_SOLID)
                            ->getStartColor()
                            ->setARGB('FFC7CE'); // Light red
                    }
                    
                    // Add borders
                    $sheet->getStyle('A'.$i.':F'.$i)
                        ->getBorders()
                        ->getAllBorders()
                        ->setBorderStyle(Border::BORDER_THIN);
                    
                    // Check for prodi/semester changes
                    if ($prodi != $currentProdi || $semester != $currentSemester) {
                        // Style previous group if exists
                        if ($currentProdi !== null) {
                            $this->styleGroup($sheet, $groupStartRow, $i-1, $currentProdi, $currentSemester);
                        }
                        
                        // Start new group
                        $currentProdi = $prodi;
                        $currentSemester = $semester;
                        $groupStartRow = $i;
                    }
                }
                
                // Style the last group
                if ($currentProdi !== null) {
                    $this->styleGroup($sheet, $groupStartRow, $lastRow, $currentProdi, $currentSemester);
                }
            }
        ];
    }
    
    protected function styleGroup($sheet, $startRow, $endRow, $prodi, $semester)
    {
        // Add group separator before the group
        $sheet->insertNewRowBefore($startRow, 1);
        
        // Add group header
        $sheet->mergeCells('A'.$startRow.':F'.$startRow);
        $sheet->setCellValue('A'.$startRow, 
            "PRODI: {$prodi} - SEMESTER: {$semester}");
        
        // Style group header
        $sheet->getStyle('A'.$startRow.':F'.$startRow)
            ->applyFromArray([
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => Color::COLOR_WHITE]
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '70AD47'] // Green
                ],
                'alignment' => [
                    'horizontal' => 'center'
                ]
            ]);
        
        // Adjust all subsequent rows
        $this->rowNumber = $endRow + 2;
    }
}