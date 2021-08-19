<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\{
    Student,
    Ketidakhadiran,
    KetidakhadiranScore,
};

class KetidakhadiranImport implements ToCollection, WithHeadingRow
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

            $name = $row['alasan_ketidakhadiran'];
            $tahun = $row['tahun'];
            $s1 = $row['jumlah_semester_1'];
            $s2 = $row['jumlah_semester_2'];

            $student = Student::where('nis', $row['nis'])->first();
            if ($student) {
                $ketidakhadiran = Ketidakhadiran::where('name', 'like', '%'.$name.'%')->first();
                if ($ketidakhadiran) {
                    $score = KetidakhadiranScore::where([
                        'student_id'            => $student->id,
                        'ketidakhadiran_id'     => $ketidakhadiran->id,
                        'th_pelajaran'          => $tahun,
                    ])->first();

                    if ($score) {
                        $score->update([
                            'n_smt_1'       => $s1,
                            'n_smt_2'       => $s2,
                        ]);
                    }else {
                        // dd('as');
                        KetidakhadiranScore::create([
                            'student_id'        => $student->id,
                            'ketidakhadiran_id' => $ketidakhadiran->id,
                            'th_pelajaran'      => (int)$tahun,
                            'n_smt_1'           => (int)$s1,
                            'n_smt_2'           => (int)$s2,
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
