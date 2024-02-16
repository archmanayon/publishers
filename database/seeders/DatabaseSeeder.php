<?php

namespace Database\Seeders;

use App\Models\Publishing;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create([
            'name' => 'ArchieM',
        ]);


        // \App\Models\Publishing::factory(10)->create();
        // or you may call this way
        // $this->call(PublishingSeeder::class);
    }
}
