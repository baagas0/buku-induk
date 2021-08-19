<?php

use Illuminate\Database\Seeder;
use App\{
    Ketidakhadiran,
    KetidakhadiranScore,
};

class KetidakhadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ketidakhadiran::create(['name' => 'Sakit']);
        Ketidakhadiran::create(['name' => 'Izin']);
        Ketidakhadiran::create(['name' => 'Tanpa Keterangan']);

        KetidakhadiranScore::create([
            'ketidakhadiran_id' => 1,
            'th_pelajaran'      => 2019,
            'student_id'        => 1,
            'n_smt_1'           => 1,
            'n_smt_2'           => 0,
        ]);

        KetidakhadiranScore::create([
            'ketidakhadiran_id' => 1,
            'th_pelajaran'      => 2020,
            'student_id'        => 1,
            'n_smt_1'           => 3,
            'n_smt_2'           => 2,
        ]);
    }
}
