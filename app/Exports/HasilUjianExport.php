<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

use App\Student;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class HasilUjianExport implements FromCollection, WithMapping, WithHeadings, WithEvents
{
    use RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($kelas_id){
        $this->kelas_id = $kelas_id;
    }
    public function collection()
    {
        $q = Student::where('kelas_id', $this->kelas_id)->get();
        
        return $q;
    }
    public function map($student): array
    {
        return [
            $student->nis,
            $student->name,
        ];
    }
    public function headings(): array
    {
        $default = [
            'Nis', 'Nama Siswa', 'UM', 'Ijazah'
        ];
        return $default;
    }
    public static function AfterSheet(AfterSheet $event) {
        $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);

        $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
    }
}
