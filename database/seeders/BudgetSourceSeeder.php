<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BudgetSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            'संघीय (नेपाल) सरकार - समानिकरण अनुदान',
            'संघीय (नेपाल) सरकार - शसर्त अनुदान चालु'
        ];

        foreach ($sources as $source) {
            \App\BudgetSource::firstOrCreate([
                'title' => $source
            ]);
        }
    }
}
