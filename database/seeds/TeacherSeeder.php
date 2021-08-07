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
        $t->name = 'Nova';
        $t->email = 'nova@mail.com';
        $t->password = bcrypt(12345);
        $t->mapel = json_encode([1]);
        $t->save();
    }
}
