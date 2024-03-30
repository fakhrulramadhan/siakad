<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //ada di folder factories
        //versi otomatisnya
         //\App\Models\User::factory(10)->create(); //akan membuatkan 10 user


         //versi static
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //panggil userseeder
        $this->call([
            UserSeeder::class
        ]);
    }
}
