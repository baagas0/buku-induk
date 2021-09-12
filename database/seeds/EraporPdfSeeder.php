<?php

use Illuminate\Database\Seeder;
use App\{
    RaporPdfExport,
    HistoryRaporPdfExport,
};

class EraporPdfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RaporPdfExport::create([
            'kelas_id'      => 1,
            'th_pelajaran'  => json_encode(['2019']),
            'created_by'    => 1,
        ]);
    }
}
