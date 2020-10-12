<?php

namespace Database\Seeders;

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
        $this->call([
            LokasiIndonesiaSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            PackagesSeeder::class,
            DummyFaqSeeder::class,
            DummyTopLocationSeeder::class,
            DummyPropertySeeder::class,
        ]);
    }
}
