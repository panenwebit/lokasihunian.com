<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('site_setting')->insert([
            'site_address' => 'Griya Asri blok. P2 No. 20, Pakuwon City, Surabaya',
            'site_phone_number' => '081286628888',
            'site_wa_number' => '081286628888',
            'site_about_us' => '',
            'web_address' => url(''),
            'fb_profile' => '',
            'twitter_profile' => '',
            'ig_profile' => '',
            'yt_profile' => '',
            'site_latitude' => '',
            'site_logitude' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
