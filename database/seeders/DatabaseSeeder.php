<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Subscription;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Genre::factory(10)->create();
        \App\Models\Director::factory(10)->create();
        \App\Models\Movie\Movie::factory(50)->create();
        \App\Models\Series\Series::factory(50)->create();

        Subscription::create([
            'name' => 'Basic',
            'price' => 2.99,
        ]);

        Subscription::create([
            'name' => 'Premium',
            'price' => 6.99,
        ]);
    }
}
