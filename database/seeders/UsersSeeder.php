<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'owner',
            'email' => 'owner@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('owner888'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('admin123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'Techlead',
            'email' => 'itech@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('itech456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'DeveloperA',
            'email' => 'developer_a@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('developera111'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'DeveloperB',
            'email' => 'developer_b@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('developerb222'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'Agen1',
            'email' => 'agen_1@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('agen123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'Agen2',
            'email' => 'agen_2@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('agen231'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'Agen3',
            'email' => 'agen_3@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('agen312'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'Pub1',
            'email' => 'pub1@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('pub01'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'Pub2',
            'email' => 'pub2@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('pub02'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Profile Table

        DB::table('profile')->insert([
            'username' => 'owner',
            'fullname' => 'Ownerx Lokasi Hunian',
            'wa_number' => '081286628888',
            'address' => 'Griya Asri P2/20 Surabaya',
            'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '081286628888',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}