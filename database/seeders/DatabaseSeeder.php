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
            SiteSettingSeeder::class,
            RolesSeeder::class,
            PermissionSeeder::class,
            RolePermissionsSeeder::class,
            PackagesSeeder::class,
            UsersSeeder::class,
            DummyFaqSeeder::class,
            DummyTopLocationSeeder::class,
            DummyPropertySeeder::class,
        ]);
    }
}
