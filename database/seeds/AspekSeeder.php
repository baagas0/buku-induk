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
        Aspek::create(['name' => 'Kesehatan']);
        Aspek::create(['name' => 'Tanggung Jawab']);
        Aspek::create(['name' => 'Sopan Santun']);
        Aspek::create(['name' => 'Percaya Diri']);
        Aspek::create(['name' => 'Kompetitif']);
        Aspek::create(['name' => 'Hubungan Sosial']);
        Aspek::create(['name' => 'Kejujuran']);
        Aspek::create(['name' => 'Pelaksanaan Ibadah Ritual']);

        AspekScore::create([
            'aspek_id'            =>1,
            'th_pelajaran'   =>2019,
            'student_id'        =>1,
            'n_smt_1'           =>'F',
            'n_smt_2'           =>'H',
        ]);

        AspekScore::create([
            'aspek_id'            =>2,
            'th_pelajaran'   =>2019,
            'student_id'        =>1,
            'n_smt_1'           =>'C',
            'n_smt_2'           =>'G',
        ]);

        AspekScore::create([
            'aspek_id'            =>3,
            'th_pelajaran'   =>2019,
            'student_id'        =>1,
            'n_smt_1'           =>'C',
            'n_smt_2'           =>'G',
        ]);

        AspekScore::create([
            'aspek_id'            =>1,
            'th_pelajaran'   =>2020,
            'student_id'        =>1,
            'n_smt_1'           =>'F',
            'n_smt_2'           =>'H',
        ]);

        AspekScore::create([
            'aspek_id'            =>2,
            'th_pelajaran'   =>2020,
            'student_id'        =>1,
            'n_smt_1'           =>'C',
            'n_smt_2'           =>'G',
        ]);

        AspekScore::create([
            'aspek_id'            =>1,
            'th_pelajaran'   =>2021,
            'student_id'        =>1,
            'n_smt_1'           =>'F',
            'n_smt_2'           =>'H',
        ]);

        AspekScore::create([
            'aspek_id'            =>2,
            'th_pelajaran'   =>2021,
            'student_id'        =>1,
            'n_smt_1'           =>'C',
            'n_smt_2'           =>'G',
        ]);
    }
}
