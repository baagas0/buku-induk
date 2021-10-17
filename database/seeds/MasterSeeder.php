<?php

use Illuminate\Database\Seeder;
use App\{Master, MasterRole};

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wk = MasterRole::create(['name' => 'Waka Kurikulum']);
        $tu = MasterRole::create(['name' => 'Tata Usaha']);
        $bendahara = MasterRole::create(['name' => 'Bendahara']);

        $t = new Master;
        $t->master_role_id = $wk->id;
        $t->background_image = 'assets/media/bg/tu.jpg';
        $t->name = 'Waka User';
        $t->email = 'waka@mail.com';
        $t->password = bcrypt(12345);
        $t->save();

        $t = new Master;
        $t->master_role_id = $tu->id;
        $t->background_image = 'assets/media/bg/tu.jpg';
        $t->name = 'TU User';
        $t->email = 'tu@mail.com';
        $t->password = bcrypt(12345);
        $t->save();

    }
}
