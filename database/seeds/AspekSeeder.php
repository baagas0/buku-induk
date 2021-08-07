<?php

use Illuminate\Database\Seeder;
use App\{
    Aspek,
    AspekScore,
};

class AspekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aspek::create(['name' => 'Kedisiplinan']);
        Aspek::create(['name' => 'Kebersihan']);

        AspekScore::create([
            'aspek_id'            =>1,
            'th_pelajaran_id'   =>2,
            'student_id'        =>1,
            'n_smt_1'           =>'F',
            'n_smt_2'           =>'H',
        ]);

        AspekScore::create([
            'aspek_id'            =>2,
            'th_pelajaran_id'   =>2,
            'student_id'        =>1,
            'n_smt_1'           =>'C',
            'n_smt_2'           =>'G',
        ]);
    }
}
