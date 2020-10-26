<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'question' => 'Bagaimana Saya mencari properti?',
            'answer' => 'Anda dapat mengetikan kata kunci (keyword) sesuai dengan properti yang anda cari pada kotak pencarian.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'question' => 'Jika saya menemukan properti yang menarik, Apa yang harus saya lakukan ?',
            'answer' => 'Anda dapat langsung menghubungi agen dengan menggunakan kontak telepon yang telah disediakan, atau mendaftarkan diri anda untuk mendapatkan akun dan menyimpan daftar properti favorit anda.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'question' => 'Bagaimana cara mendaftar ke lokasihunian.com ?',
            'answer' => 'Jika anda merupakan Developer atau Agen baik Independen maupun Agen yang tergabung dalam perusahaan properti. Maka anda dapat mendaftarkan diri Anda dengan mengklik tombol Login/Daftar yang terdapat pada sisi kanan atas.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'question' => 'Saya kehilangan password untuk mengakses akun saya, apa yang harus saya lakukan?',
            'answer' => 'Anda dapat mengklik tombol Login/Daftar yang terdapat pada sisi kanan atas, lalu pilih menu reset password. gunakan email yang telah anda daftarkan untuk mengatur ulang kata sandi akun anda.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
    }
}
