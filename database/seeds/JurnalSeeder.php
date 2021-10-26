<?php

use App\Jurnal;
use Illuminate\Database\Seeder;

class JurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jurnal::create([
            'date' => now(),
            'jam_ke' => '1',
            'mapel_id' => 1,
            'kelas_id' => 1,
            'materi' => 'Pengenalan Istigosah',
        ]);
    }
}
