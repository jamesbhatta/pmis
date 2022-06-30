<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        settings()->set([
            'app_name' => 'PMIS',
            'app_name_en' => 'PMIS'
        ]);
    }
}
