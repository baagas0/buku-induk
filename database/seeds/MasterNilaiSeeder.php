<?php

use Illuminate\Database\Seeder;
use App\{
    MasterNilai,
    Nilai,
};

class MasterNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            Master Nilai PAI - Al'quran
        */
        $ms_quran = MasterNilai::create([
            'th_pelajaran'      => 2019,
            'is_sub'            => 1,
            'mapel_id'          => 0,
            'sub_mapel_id'      => 1,
            'kkm'               => 60,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_quran->id,
            'semester'       => 1,
            'n_peng'            => 90,
            'n_ketr'            => 99,
            'n_skp'             => 98,
        ]);
        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_quran->id,
            'semester'       => 2,
            'n_peng'            => 91,
            'n_ketr'            => 98,
            'n_skp'             => 97,
        ]);


        /*
            Master Nilai PAI - Fiqih
        */
        $ms_fiqih = MasterNilai::create([
            'th_pelajaran'      => 2019,
            'is_sub'            => 1,
            'mapel_id'          => 0,
            'sub_mapel_id'      => 2,
            'kkm'               => 61,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_fiqih->id,
            'semester'       => 1,
            'n_peng'            => 90,
            'n_ketr'            => 99,
            'n_skp'             => 98,
        ]);
        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_fiqih->id,
            'semester'       => 2,
            'n_peng'            => 91,
            'n_ketr'            => 97,
            'n_skp'             => 98,
        ]);

        /*
            Master Nilai PPKn
        */
        $ms_ppkn = MasterNilai::create([
            'th_pelajaran'      => 2019,
            'is_sub'            => 0,
            'mapel_id'          => 2,
            'sub_mapel_id'      => 0,
            'kkm'               => 62,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_ppkn->id,
            'semester'       => 1,
            'n_peng'            => 91,
            'n_ketr'            => 92,
            'n_skp'             => 93,
        ]);
        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_ppkn->id,
            'semester'       => 2,
            'n_peng'            => 90,
            'n_ketr'            => 94,
            'n_skp'             => 92,
        ]);

        /*
            Master Nilai Seni Budaya
        */
        $ms_senbud = MasterNilai::create([
            'th_pelajaran'      => 2019,
            'is_sub'            => 0,
            'mapel_id'          => 3, //mapel id'ne koyoe salah ki jajal cek, Wes bener ko
            'sub_mapel_id'      => 0,
            'kkm'               => 63,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_senbud->id,
            'semester'       => 1,
            'n_peng'            => 94,
            'n_ketr'            => 95,
            'n_skp'             => 96,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_senbud->id,
            'semester'       => 2,
            'n_peng'            => 93,
            'n_ketr'            => 99,
            'n_skp'             => 91,
        ]);

        /*
            Master Nilai PAI - Al'quran
        */
        $ms_quran = MasterNilai::create([
            'th_pelajaran'      => 2020,
            'is_sub'            => 1,
            'mapel_id'          => 0,
            'sub_mapel_id'      => 1,
            'kkm'               => 70,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_quran->id,
            'semester'       => 1,
            'n_peng'            => 90,
            'n_ketr'            => 99,
            'n_skp'             => 98,
        ]);
        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_quran->id,
            'semester'       => 2,
            'n_peng'            => 91,
            'n_ketr'            => 98,
            'n_skp'             => 97,
        ]);


        /*
            Master Nilai PAI - Fiqih
        */
        $ms_fiqih = MasterNilai::create([
            'th_pelajaran'      => 2020,
            'is_sub'            => 1,
            'mapel_id'          => 0,
            'sub_mapel_id'      => 2,
            'kkm'               => 71,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_fiqih->id,
            'semester'       => 1,
            'n_peng'            => 90,
            'n_ketr'            => 99,
            'n_skp'             => 98,
        ]);
        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_fiqih->id,
            'semester'       => 2,
            'n_peng'            => 91,
            'n_ketr'            => 97,
            'n_skp'             => 98,
        ]);

        /*
            Master Nilai PPKn
        */
        $ms_ppkn = MasterNilai::create([
            'th_pelajaran'      => 2020,
            'is_sub'            => 0,
            'mapel_id'          => 2,
            'sub_mapel_id'      => 0,
            'kkm'               => 72,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_ppkn->id,
            'semester'       => 1,
            'n_peng'            => 91,
            'n_ketr'            => 92,
            'n_skp'             => 93,
        ]);
        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_ppkn->id,
            'semester'       => 2,
            'n_peng'            => 90,
            'n_ketr'            => 94,
            'n_skp'             => 92,
        ]);

        /*
            Master Nilai Seni Budaya
        */
        $ms_senbud = MasterNilai::create([
            'th_pelajaran'      => 2020,
            'is_sub'            => 0,
            'mapel_id'          => 3, //mapel id'ne koyoe salah ki jajal cek, Wes bener ko
            'sub_mapel_id'      => 0,
            'kkm'               => 73,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_senbud->id,
            'semester'       => 1,
            'n_peng'            => 94,
            'n_ketr'            => 95,
            'n_skp'             => 96,
        ]);

        Nilai::create([
            'student_id'        => 1,
            'master_nilai_id'   => $ms_senbud->id,
            'semester'       => 2,
            'n_peng'            => 93,
            'n_ketr'            => 99,
            'n_skp'             => 91,
        ]);
    }
}
