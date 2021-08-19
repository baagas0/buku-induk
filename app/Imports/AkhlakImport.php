<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\{
    Student,
    Aspek,
    AspekScore,
};

class AkhlakImport implements ToCollection, WithHeadingRow
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
            // dd($row);
            $student = Student::where('nis', $row['nis'])->first();
            if ($student) {
                $aspek = Aspek::where('name', 'like', '%'.$row['nama_aspek'].'%')->first();
                if ($aspek) {
                    $score = AspekScore::where([
                        'student_id'    => $student->id,
                        'aspek_id'      => $aspek->id,
                        'th_pelajaran'  => $row['tahun'],
                    ])->first();
                    if ($score) {
                        $score->update([
                            'n_smt_1'       => $row['nilai_semester_1'],
                            'n_smt_2'       => $row['nilai_semester_2'],
                        ]);
                    }else {
                        AspekScore::create([
                            'student_id'    => $student->id,
                            'aspek_id'      => $aspek->id,
                            'th_pelajaran'  => $row['tahun'],
                            'n_smt_1'       => $row['nilai_semester_1'],
                            'n_smt_2'       => $row['nilai_semester_2'],
                        ]);
                    }
                }
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
