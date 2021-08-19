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


class NilaiExport implements FromCollection, WithMapping, WithHeadings, WithEvents
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
        return Student::get();
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
            'NIS',
            'Nama Siswa',
            'Pengetahuan',
            'Keterampilan',
            'Sikap',
        ];
        return $default;
    }
    public static function AfterSheet(AfterSheet $event) {
        $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);

        $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(15);
    }
}
