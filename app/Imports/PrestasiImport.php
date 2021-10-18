<?php

namespace App\Imports;

use App\Kegiatan;
use App\Prestasi;
use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PrestasiImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // dd($row);
            $student = Student::where('nis', $row['nis'])->first();
            $kegiatan = Kegiatan::where('name', $row['kegiatan'])->first();

            if ($student && $kegiatan && !empty($row['nomor_sertifikat'])) {
                Prestasi::create([
                    'kegiatan_id'       => $kegiatan->id,
                    'student_id'        => $student->id,
                    'nomor_sertifikat'  => $row['nomor_sertifikat'],
                ]);
            }
        }
    }

    public function headingRow(): int
    {
        return 1;
    }
}
