<?php

use Illuminate\Database\Seeder;
use App\{
    HasilUjian,
};

class HasilUjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
            Nilai PAI - Al-Qur'an
        */
        HasilUjian::create([
            'student_id'    => 1,
            'mapel_id'      => 0,
            'sub_mapel_id'  => 1,
            'n_ijazah'      => 65,
            'n_um'          => 45,
        ]);

        /*
            Nilai PAI - Fiqih
        */
        HasilUjian::create([
            'student_id'    => 1,
            'mapel_id'      => 0,
            'sub_mapel_id'  => 2,
            'n_ijazah'      => 65,
            'n_um'          => 45,
        ]);

        /*
            Nilai PPKn
        */
        HasilUjian::create([
            'student_id'    => 1,
            'mapel_id'      => 2,
            'sub_mapel_id'  => 0,
            'n_ijazah'      => 60,
            'n_um'          => 55,
        ]);

        /*
            Nilai Seni Budaya
        */
        HasilUjian::create([
            'student_id'    => 1,
            'mapel_id'      => 3,
            'sub_mapel_id'  => 0,
            'n_ijazah'      => 75,
            'n_um'          => 50,
        ]);
    }
}
