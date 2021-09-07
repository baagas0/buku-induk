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
        $ka = new Kelompok;
        $ka->code = 'AA';
        $ka->name = 'Kelompok Wajib A';
        $ka->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = 1;
            $mapel->name = 'PAI';
            $mapel->is_sub = 1;
            $mapel->save();

                $mapel = new SubMapel;
                $mapel->mapel_id = 1;
                $mapel->name = 'AL - Quran';
                $mapel->save();

                $mapel = new SubMapel;
                $mapel->mapel_id = 1;
                $mapel->name = 'Fikih';
                $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = 1;
            $mapel->name = 'PPKn';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = 1;
            $mapel->name = 'Bahasa Indonesia';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = 1;
            $mapel->name = 'Bahasa Arab';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = 1;
            $mapel->name = 'Matematika';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = 1;
            $mapel->name = 'Sejarah Indonesia';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = 1;
            $mapel->name = 'Bahasa Inggris';
            $mapel->is_sub = 0;
            $mapel->save();

        $kb = new Kelompok;
        $kb->code = 'AB';
        $kb->name = 'Kelompok B';
        $kb->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kb->id;
            $mapel->name = 'Seni Budaya';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kb->id;
            $mapel->name = 'PJOK';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kb->id;
            $mapel->name = 'Prakarya dan KU';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kb->id;
            $mapel->name = 'Bahasa Jawa';
            $mapel->is_sub = 0;
            $mapel->save();

        $kp = new Kelompok;
        $kp->code = 'AB';
        $kp->name = 'Kelompok Peminatan IPA';
        $kp->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kp->id;
            $mapel->name = 'Matematika';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kp->id;
            $mapel->name = 'Biologi';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kp->id;
            $mapel->name = 'Fisika';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kp->id;
            $mapel->name = 'Kimia';
            $mapel->is_sub = 0;
            $mapel->save();

        $kpp = new Kelompok;
        $kpp->code = 'AB';
        $kpp->name = 'Mata Pelajaran Pilihan';
        $kpp->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kpp->id;
            $mapel->name = 'Ekonomi dan Sastra Inggris';
            $mapel->is_sub = 0;
            $mapel->save();

            $mapel = new Mapel;
            $mapel->kelompok_id = $kpp->id;
            $mapel->name = 'Ekonomi';
            $mapel->is_sub = 0;
            $mapel->save();
    }
}
