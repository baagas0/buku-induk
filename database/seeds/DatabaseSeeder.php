<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(MasterSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(ThPelajaranSeeder::class);
        $this->call(PengembanganDiriSeeder::class);
        $this->call(AspekSeeder::class);
        $this->call(KetidakhadiranSeeder::class);
        $this->call(NilaiSeeder::class);
        $this->call(PrestasiSeeder::class);
        $this->call(KelulusanSeeder::class);
        $this->call(HasilUjianSeeder::class);
        
        // $this->call(DataMasterNilaiSeeder::class);
    }
}
