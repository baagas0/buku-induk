<?php

namespace App\Imports;

use App\Kelas;
use App\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        $kelas = Kelas::where('name', 'like', '%' . $row['kelas'] . '%')->first();
        if (!$kelas) {
            $kelas = Kelas::create([
                'name' => $row['kelas'],
            ]);
        }

        $email = isset($row['email']) ? $row['email'] : $row['nis'] . '@mail.com';
        $checkStudent = Student::where([
            'nis'   => $row['nis'],
            'email' => $email,
        ])->first();

        if (!$checkStudent) {
            return new Student([
                'kelas_id' => $kelas->id,
                'nis'      => $row['nis'],
                'name'      => $row['nama'],
                'email'     => $email,
            ]);
        } else {
            $checkStudent->update([
                'kelas_id' => $kelas->id,
                'nis'      => $row['nis'],
                'name'      => $row['nama'],
                'email'     => $email,
            ]);

            return $checkStudent;
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
