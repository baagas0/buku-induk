<?php

use Illuminate\Database\Seeder;
use App\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t = new Teacher;
        $t->name = 'Nova Spd, Mpd';
        $t->email = 'nova@mail.com';
        $t->password = bcrypt(12345);
        $t->mapel = json_encode(['PPKn']);
        $t->save();

        $t = new Teacher;
        $t->name = 'Joko Agung Sayuto Spd, Mpd';
        $t->email = 'sayuto@mail.com';
        $t->password = bcrypt(12345);
        $t->mapel = json_encode(['PPKn']);
        $t->save();
    }
}
