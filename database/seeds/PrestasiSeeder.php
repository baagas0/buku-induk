<?php

use Illuminate\Database\Seeder;
use App\{
    Kegiatan,
    Prestasi,
};

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = Kegiatan::create(['name' => 'Ekstrakurikuler']);
        $b = Kegiatan::create([
            'name' => 'Keikutsertaan dalam organisasi kegiatan sekolah'
        ]);
        $c = Kegiatan::create(['name' => 'Catatan khusus lainnya']);

        Prestasi::create([
            'student_id'        => 1,
            'kegiatan_id'       => $a->id,
            'nomor_sertifikat'  => 'AWS-210213-SA',
        ]);

        Prestasi::create([
            'student_id'        => 1,
            'kegiatan_id'       => $a->id,
            'nomor_sertifikat'  => 'AWS-217237-CG',
        ]);

        Prestasi::create([
            'student_id'        => 1,
            'kegiatan_id'       => $a->id,
            'nomor_sertifikat'  => 'AWS-217237-CG',
        ]);

        Prestasi::create([
            'student_id'        => 1,
            'kegiatan_id'       => $b->id,
            'nomor_sertifikat'  => 'AWS-217237-CG',
        ]);

        Prestasi::create([
            'student_id'        => 1,
            'kegiatan_id'       => $b->id,
            'nomor_sertifikat'  => 'AWS-217237-CG',
        ]);
    }
}
