<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\{
    Student,
    Upd,
    UpdScore,
};

class UpdImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function  __construct($data)
    {
        $this->data= $data;
    }

    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            $student = Student::where('nis', $row['nis'])->first();
            if ($student) {
                $upd     = Upd::where('name', 'like', '%'.$row['nama_kegiatan'].'%')->first();
                if (!$upd) {
                    $upd = Upd::create(['name' => $row['nama_kegiatan']]);
                }

                $checkUpd = UpdScore::where([
                    'upd_id'        => $upd->id,
                    'th_pelajaran'  => $row['tahun'],
                    'student_id'    => $student->id,
                ])->first();

                if (!$checkUpd) {
                    UpdScore::create([
                        'upd_id'        => $upd->id,
                        'th_pelajaran'  => $row['tahun'],
                        'student_id'    => $student->id,
                        'n_smt_1'       => $row['nilai_semester_1'],
                        'n_smt_2'       => $row['nilai_semester_2'],
                    ]);
                }else {
                    $checkUpd->update([
                        'n_smt_1'       => $row['nilai_semester_1'],
                        'n_smt_2'       => $row['nilai_semester_2'],
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
