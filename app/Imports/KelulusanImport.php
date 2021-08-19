<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\{
    Student,
    Kelulusan,
    KetidakhadiranScore,
};

class KelulusanImport implements ToCollection, WithHeadingRow
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
            // dd([$row['tahun'],$row['jumlah_semester_1'],$row['jumlah_semester_2'],]);
            // dd($row);
            $name = $row['uraian'];
            $s1 = $row['nilai_ijazah'];
            $s2 = $row['nilai_skhun'];
            $s3 = $row['nilai_shuambn'];

            $student = Student::where('nis', $row['nis'])->first();
            if ($student) {
                if ($row['uraian']) {
                    $kelulusan = Kelulusan::where('student_id', $student->id)
                    ->where('uraian', 'like', '%'.$row['uraian'].'%')->first();
                    if ($kelulusan) {
                        $kelulusan->update([
                            'ijazah'         => $s1,
                            'skhun'         => $s2,
                            'shuambn'       => $s3,
                        ]);
                    }else{
                        Kelulusan::create([
                            'student_id'    => $student->id,
                            'uraian'        => $row['uraian'],
                            'ijazah'         => $s1,
                            'skhun'         => $s2,
                            'shuambn'       => $s3,
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
