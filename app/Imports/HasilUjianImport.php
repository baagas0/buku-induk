<?php

namespace App\Imports;

use App\{
    Nilai,
    MasterNilai,
    Student,
    HasilUjian,
};

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HasilUjianImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function  __construct($mapel)
    {
        $this->mapel= $mapel;
    }

    public function collection(Collection $rows)
    {
        $ms = explode(",", $this->mapel);

        foreach ($rows as $row) 
        {
            $student = Student::where('nis', $row['nis'])->first();

            if ($student) {
                $hasilUjian = HasilUjian::where([
                    'student_id'    => $student->id,
                    'mapel_id'      => $ms[0],
                    'sub_mapel_id'  => $ms[1],
                ])->first();
                if ($hasilUjian) {
                    $hasilUjian->update([
                        'n_um'      => (int)$row['um'],
                        'n_ijazah'  => (int)$row['ijazah']
                    ]);
                }else {
                    HasilUjian::create([
                        'student_id'    => $student->id,
                        'mapel_id'      => $ms[0],
                        'sub_mapel_id'  => $ms[1],
                        'n_um'          => (int)$row['um'],
                        'n_ijazah'      => (int)$row['ijazah']
                    ]);
                }
            }
        }
    }
    public function headingRow(): int
    {
        return 1;
    }
}
