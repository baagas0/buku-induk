<?php

use Illuminate\Database\Seeder;
use App\{
    Kelulusan,
};

class KelulusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelulusan::create([
            'student_id'=> 1,
            'uraian'    => 'Nomor',
            'ijazah'    => null,
            'skhun'     => null,
            'shuambn'   => null,
        ]);

        Kelulusan::create([
            'student_id'=> 1,
            'uraian'    => 'Penanggalan',
            'ijazah'    => null,
            'skhun'     => null,
            'shuambn'   => null,
        ]);

        Kelulusan::create([
            'student_id'=> 1,
            'uraian'    => 'Diberikan Tanggal',
            'ijazah'    => null,
            'skhun'     => null,
            'shuambn'   => null,
        ]);
    }
}
