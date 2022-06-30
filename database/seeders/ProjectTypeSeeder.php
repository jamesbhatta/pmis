<?php

namespace Database\Seeders;

use App\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // खानेपानी
        ProjectType::firstOrCreate([
            'name' => 'खानेपानी आपूर्ति कार्यक्रम',
            'topic_id' => 1
        ]);

        // यातायात
        ProjectType::firstOrCreate([
            'name' => 'सडक/बाटो मर्मत/ढलान तथा स्तरोन्नती',
            'topic_id' => 5
        ]);
        ProjectType::firstOrCreate([
            'name' => 'सडक/बाटो विस्तार तथा नयाँ ट्रयाक',
            'topic_id' => 5
        ]);
        ProjectType::firstOrCreate([
            'name' => 'सडक ग्रावेल तथा कालोपत्रे',
            'topic_id' => 5
        ]);
        ProjectType::firstOrCreate([
            'name' => 'सडक ढल निर्माण तथा व्यवस्थापन',
            'topic_id' => 5
        ]);
        ProjectType::firstOrCreate([
            'name' => 'हेमपाइप जडान तथा मर्मत',
            'topic_id' => 5
        ]);
    }
}
