<?php

use Illuminate\Database\Seeder;
use App\ThPelajaran;

class ThPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThPelajaran::create([
            'th_mulai'      => '2019',
            'th_selesai'    => '2020',
        ]);

        ThPelajaran::create([
            'th_mulai'      => '2020',
            'th_selesai'    => '2021',
        ]);
    }
}
