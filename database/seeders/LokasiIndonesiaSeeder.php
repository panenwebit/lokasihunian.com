<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiIndonesiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sometimes it doesnt work
        $path = './database/seeders/kode_wilayah_indonesia_2020.sql';
        DB::unprepared(DB::raw(file_get_contents($path)));
        $this->command->info('Lokasi_Indonesia table seeded!');
    }
}
