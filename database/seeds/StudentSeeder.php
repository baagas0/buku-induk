<?php

use Illuminate\Database\Seeder;
use App\{
    Student,
    Kelas
};

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create(['name' => 'RPL 1']);
        Kelas::create(['name' => 'TKJ']);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Bagas Aditya Mahendra',
            'nis'       => '11800659',
            'email'     => '11800659@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Adek Candra Nur Wijayanti',
            'nis'       => '11800661',
            'email'     => '11800661@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Rouf Mawanto',
            'nis'       => '11800662',
            'email'     => '11800662@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Lila Setyaningsih',
            'nis'       => '11800663',
            'email'     => '11800663@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Linda',
            'nis'       => '11800664',
            'email'     => '11800664@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Aan Febryan',
            'nis'       => '11800665',
            'email'     => '11800665@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Akbar Nurdiansah',
            'nis'       => '11800666',
            'email'     => '11800666@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Amiroh Nabila Khoir',
            'nis'       => '11800667',
            'email'     => '11800667@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Ayub Aminudin',
            'nis'       => '11800668',
            'email'     => '11800668@mail.com',
            'password'  => bcrypt(12345),
        ]);

        Student::create([
            'kelas_id'  => 1,
            'name'      => 'Laelly Hindarsyah',
            'nis'       => '11800669',
            'email'     => '11800669@mail.com',
            'password'  => bcrypt(12345),
        ]);
    }
}
