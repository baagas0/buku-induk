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

class PrestasiExport implements FromCollection, WithMapping, WithHeadings, WithEvents
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
        $q = DB::select("SELECT a.id, a.nis, a.name as student_name, b.name as kegiatan_name
          FROM students AS a
          JOIN kegiatans AS b
          where a.kelas_id = ".$this->kelas_id."
          order by a.nis, b.id");
        
        return collect($q);
    }
    public function map($student): array
    {
        return [
            $student->nis,
            $student->student_name,
            $student->kegiatan_name,
        ];
    }
    public function headings(): array
    {
        $default = [
            'Nis', 'Nama Siswa', 'Kegiatan', 'Nomor Sertifikat'
        ];
        return $default;
    }
    public static function AfterSheet(AfterSheet $event) {
        $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(15);
        $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);

        $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(50);
        $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(25);
    }
}
