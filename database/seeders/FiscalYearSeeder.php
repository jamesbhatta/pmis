<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiscalYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eloquent::unguard();
        $path = database_path('seeders/files/fiscal_years.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('Fiscal year table seeded!');

        // DB::table('fiscal_years')->insert([
        //     'start_ad'=>'2020-01-01',
        //     'end_ad'=>'2020-12-31',
        //     'name' => '2019-2020',
        //     'start' => "2078-01-01",
        //     'end' => "2078-12-31",
        // ]);
    }
}
