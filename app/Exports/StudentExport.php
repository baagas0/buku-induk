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


class StudentExport implements FromCollection, WithMapping, WithHeadings, WithEvents
{
    use RegistersEventListeners;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($kelas_id, $heading){
        $this->kelas_id = $kelas_id;
        $this->heading = $heading;
    }
    public function collection()
    {
        $q = DB::select("SELECT a.id, a.nis, a.name as student_name, b.name as aspek_name
          FROM students AS a
          JOIN aspeks AS b
          order by a.nis");
        
        return collect($q);
    }
    public function map($student): array
    {
        return [
            $student->id,
            $student->nis,
            $student->student_name,
            $student->aspek_name,
        ];
    }
    public function headings(): array
    {
        $default = [
            '#',
            'NIS',
            'Nama Siswa',
            'sad'
        ];
        return $default;
        // return array_merge($default, $this->heading);
    }
    public static function AfterSheet(AfterSheet $event) {
        $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(5);
        $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(30);

        $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(15);
    }
}
