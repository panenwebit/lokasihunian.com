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
            'username' => 'admin2',
            'email' => 'admin2@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('admin1232'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'techlead',
            'email' => 'itech@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('itech456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'developera',
            'email' => 'developer_a@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('developera111'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'developerb',
            'email' => 'developer_b@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('developerb222'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'agen1',
            'email' => 'agen_1@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('agen123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'agen2',
            'email' => 'agen_2@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('agen231'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'agen3',
            'email' => 'agen_3@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('agen312'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'pub1',
            'email' => 'pub1@lokasihunian.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => Hash::make('pub01'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'username' => 'pub2',
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
            'handphone_number' => '081286628888',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
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

        DB::table('profile')->insert([
            'username' => 'admin',
            'fullname' => 'Adminx Lokasi Hunian',
            'wa_number' => '081286628123',
            'handphone_number' => '081286628123',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '081286628123',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'admin2',
            'fullname' => 'Admin Ke2x Lokasi Hunian',
            'wa_number' => '081286621232',
            'handphone_number' => '081286621232',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '081286621232',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'techlead',
            'fullname' => 'ITx Lokasi Hunian',
            'wa_number' => '085104325154',
            'handphone_number' => '085104325154',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325154',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'developera',
            'fullname' => 'Developer A',
            'wa_number' => '085104325111',
            'handphone_number' => '085104325111',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325111',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'qr_code' => 'storage/images/qrcode/dummy/developera.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'developerb',
            'fullname' => 'Developer B',
            'wa_number' => '085104325222',
            'handphone_number' => '085104325222',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325222',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'qr_code' => 'storage/images/qrcode/dummy/developerb.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'agen1',
            'fullname' => 'Agen ke 1',
            'wa_number' => '085104325123',
            'handphone_number' => '085104325123',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325123',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'qr_code' => 'storage/images/qrcode/dummy/agen1.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'agen2',
            'fullname' => 'Agen ke 2',
            'wa_number' => '085104325231',
            'handphone_number' => '085104325231',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325231',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'qr_code' => 'storage/images/qrcode/dummy/agen2.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'agen3',
            'fullname' => 'Agen ke 3',
            'wa_number' => '085104325213',
            'handphone_number' => '085104325213',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325213',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'qr_code' => 'storage/images/qrcode/dummy/agen3.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'pub1',
            'fullname' => 'Publik 1',
            'wa_number' => '085104325201',
            'handphone_number' => '085104325201',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325201',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('profile')->insert([
            'username' => 'pub2',
            'fullname' => 'Publik 2',
            'wa_number' => '085104325202',
            'handphone_number' => '085104325202',
            // 'address' => 'Griya Asri P2/20 Surabaya',
            // 'address_location' => '35.78.26.1004',
            'about_me' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet totam saepe incidunt corporis aspernatur maiores iste unde accusantium, id doloremque, quia odit molestias dignissimos exercitationem sequi perferendis, reiciendis ex maxime quam cupiditate tempore quae culpa quis? Dolorem provident cum, cupiditate in ab nesciunt doloribus unde ipsam facere eaque facilis pariatur.',
            'photo' => url('assets/img/agen/user_default.png'),
            'company_name' => 'Panen Web',
            'company_address' => 'Griya Asri P2/20 Surabaya',
            'company_location' => '35.78.26.1004',
            'company_phone' => '085104325202',
            'web_address' => 'www.lokasihunian.com',
            'fb_profile' => 'lokasihunian',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        //Roles Table
        DB::table('model_has_roles')->insert([
            'model_username' => 'owner',
            'role_id' => '1',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'admin',
            'role_id' => '2',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'admin2',
            'role_id' => '2',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'techlead',
            'role_id' => '3',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'developera',
            'role_id' => '4',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'developerb',
            'role_id' => '4',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'agen1',
            'role_id' => '5',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'agen2',
            'role_id' => '5',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'agen3',
            'role_id' => '5',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'pub1',
            'role_id' => '6',
            'model_type' => 'App\Models\User',
        ]);

        DB::table('model_has_roles')->insert([
            'model_username' => 'pub2',
            'role_id' => '6',
            'model_type' => 'App\Models\User',
        ]);
    }
}