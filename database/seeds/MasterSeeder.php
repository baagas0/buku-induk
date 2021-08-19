<?php

use Illuminate\Database\Seeder;
use App\Master;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = new Master;
        $t->name = 'TU User';
        $t->email = 'tu@mail.com';
        $t->password = bcrypt(12345);
        $t->save();
    }
}
