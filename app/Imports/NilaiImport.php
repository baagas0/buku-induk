<?php

namespace App\Imports;

use App\{
    Nilai,
    MasterNilai,
    Student,
};
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function  __construct($data)
    {
        $this->data= $data;
    }

    public function collection(Collection $rows)
    {
        $ms = explode(",", $this->data['mapel']);

        foreach ($rows as $row) 
        {
            $semester = $this->data['semester'];
            $student = Student::where('nis', $row['nis'])->first();

            if ($student) {
                if ($semester == 1) {
                    $mn = MasterNilai::create([
                        'th_pelajaran'      => $this->data['tahun_pelajaran'],
                        'is_sub'            => $ms[0] == 0 ? '0' : '1',
                        'mapel_id'          => $ms[0],
                        'sub_mapel_id'      => $ms[1],
                        'kkm'               => $this->data['kkm'],
                    ]);
                    Nilai::create([
                        'student_id'        => $student ? $student->id : 0,
                        'master_nilai_id'   => $mn->id,
                        'semester'          => $semester,
                        'n_peng'            => $row['pengetahuan'],
                        'n_ketr'            => $row['keterampilan'],
                        'n_skp'             => $row['sikap'],
                    ]);
                    Nilai::create([
                        'student_id'        => $student ? $student->id : 0,
                        'master_nilai_id'   => $mn->id,
                        'semester'          => 2,
                        'n_peng'            => 0,
                        'n_ketr'            => 0,
                        'n_skp'             => 0,
                    ]);
                }else {
                    $mn = MasterNilai::where([
                        'th_pelajaran'      => $this->data['tahun_pelajaran'],
                        'mapel_id'          => $ms[0],
                        'sub_mapel_id'      => $ms[1],
                    ])->select('id')->get()->toArray();
                    // dd($mn);
                    $n = Nilai::whereIn('master_nilai_id', $mn)
                    ->where([
                        'student_id'    => $student->id,
                        'semester'      => 2,
                    ])
                    ->first();
                    
                    $n->update([
                        'n_peng'            => $row['pengetahuan'],
                        'n_ketr'            => $row['keterampilan'],
                        'n_skp'             => $row['sikap'],
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
