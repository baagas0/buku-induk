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
    }
}
