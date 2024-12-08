<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        // Call the CelebritySeeder to populate the celebrities table
        $this->call(CelebritySeeder::class);
    }

}
