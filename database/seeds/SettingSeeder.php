<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'slug'          => 'app_name',
            'value'         => 'Buku Induk',
            'description'   => '',
        ]);

        Setting::create([
            'slug'          => 'school_name',
            'value'         => 'SMK Wikrama 1 Jepara',
            'description'   => '',
        ]);

        Setting::create([
            'slug'          => 'favicon',
            'value'         => 'assets/media/logos/favicon_l_1.ico',
            'description'   => '',
        ]);

        Setting::create([
            'slug'          => 'logo_l_1',
            'value'         => 'assets/media/logos/logo-l-1.png',
            'description'   => '',
        ]);

        Setting::create([
            'slug'          => 'logo_l_2',
            'value'         => 'assets/media/logos/logo-l-2.png',
            'description'   => '',
        ]);
    }
}
