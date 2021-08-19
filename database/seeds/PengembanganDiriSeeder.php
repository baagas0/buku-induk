<?php

use Illuminate\Database\Seeder;
use App\{
    Upd,
    UpdScore,
};

class PengembanganDiriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Upd::create(['name' => 'Osim']);
        Upd::create(['name' => 'Pramuka']);
        Upd::create(['name' => 'PMR']);
        Upd::create(['name' => 'Voly']);

        UpdScore::create([
            'upd_id'            =>1,
            'th_pelajaran'   =>2019,
            'student_id'        =>1,
            'n_smt_1'           =>'A',
            'n_smt_2'           =>'B',
        ]);

        UpdScore::create([
            'upd_id'            =>2,
            'th_pelajaran'   =>2019,
            'student_id'        =>1,
            'n_smt_1'           =>'C',
            'n_smt_2'           =>'B',
        ]);
    }
}
