<?php

use Illuminate\Database\Seeder;
// use App\MapelSubject;
use App\{
    Kelompok,
    Mapel,
    SubMapel,
};

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k = new Kelompok;
        $k->code = 'AA';
        $k->name = 'Kelompok A';
        $k->save();

        $mapel = new Mapel;
        $mapel->kelompok_id = 1;
        $mapel->name = 'PAI';
        $mapel->is_sub = 1;
        $mapel->save();

        $mapel = new Mapel;
        $mapel->kelompok_id = 1;
        $mapel->name = 'PPKn';
        $mapel->is_sub = 0;
        $mapel->save();

        $mapel = new SubMapel;
        $mapel->mapel_id = 1;
        $mapel->name = 'AL - Quran';
        $mapel->save();

        $mapel = new SubMapel;
        $mapel->mapel_id = 1;
        $mapel->name = 'Fikih';
        $mapel->save();

        $k = new Kelompok;
        $k->code = 'AB';
        $k->name = 'Kelompok B';
        $k->save();

        $mapel = new Mapel;
        $mapel->kelompok_id = 2;
        $mapel->name = 'Seni Budaya';
        $mapel->is_sub = 0;
        $mapel->save();
    }
}
