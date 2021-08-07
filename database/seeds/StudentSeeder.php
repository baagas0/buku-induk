<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'name'      => 'Bagas Aditya Mahendra',
            'nis'       => '11800659',
            'email'     => 'student@mail.com',
            'password'  => bcrypt(12345),

        ]);
    }
}
