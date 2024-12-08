<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Celebrity;

class CelebritySeeder extends Seeder
{
    public function run()
    {
        // Create 20 fake celebrity entries
        Celebrity::factory(20)->create();
    }
}
