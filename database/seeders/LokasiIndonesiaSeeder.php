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
        $path = './database/seeders/sql/lokasi_indonesia/lokasi_indonesia_part_1.sql';
        DB::unprepared(DB::raw(file_get_contents($path)));
        $path = './database/seeders/sql/lokasi_indonesia/lokasi_indonesia_part_2.sql';
        DB::unprepared(DB::raw(file_get_contents($path)));
        $path = './database/seeders/sql/lokasi_indonesia/lokasi_indonesia_part_3.sql';
        DB::unprepared(DB::raw(file_get_contents($path)));
        $path = './database/seeders/sql/lokasi_indonesia/lokasi_indonesia_part_4.sql';
        DB::unprepared(DB::raw(file_get_contents($path)));
        $path = './database/seeders/sql/lokasi_indonesia/lokasi_indonesia_part_5.sql';
        DB::unprepared(DB::raw(file_get_contents($path)));
        $this->command->info('Lokasi_Indonesia table seeded!');
    }
}
