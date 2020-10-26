<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DummyPropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = 100;
        $username = array('agen1', 'agen2', 'agen3', 'developera', 'developerb');
        $term = array('Beli', 'Sewa');
        $condition = array('Baru', 'Bekas');
        $type = array('Apartemen', 'Rumah', 'Tanah', 'Ruko', 'Vila', 'Gudang', 'Pabrik', 'Kantor', 'Toko', 'Stand', 'Gedung', 'Hotel');
        $status = array('Pending', 'Live', 'Archived');
        $location = array('31.71.03.1006', '35.78.08.1004', '32.73.13.1002', '32.71.05.1007', '34.04.13.2005');

        $images = array(
            'storage/images/property/dummy/2020/10/07/RMPfru9MBhJrTxBnT3IHx0qTWYpClkVST6yDuFLC.jpeg',
            'storage/images/property/dummy/2020/10/07/fiwYiq5weep3ZpHi2b1aLeCQG2xxfhS3XRtn0gTt.jpeg',
            'storage/images/property/dummy/2020/10/07/qxV7nlusOS0qzvqFOA5y0SdqpKSvXvlvjLkzhxcp.jpeg',
            'storage/images/property/dummy/2020/10/07/LQ3uNYlarWdFZEhMw58EFEbH2jUUdu4erSnKPwzp.jpeg',
            'storage/images/property/dummy/2020/10/07/emF8OayfJJXooes9oTZrRQIC9MZjulNYpgJvCWAF.jpeg',
            'storage/images/property/dummy/2020/10/07/1OBJ9ZlCRPbKsu4kc8FAafZYTCecWCK4o4WHCSM1.jpeg',
            'storage/images/property/dummy/2020/10/07/mi1hHrgQhWhtZEXJgDrflqlMS9k5VA2ua3KKDXZe.jpeg',
            'storage/images/property/dummy/2020/10/07/7PxOpVFQHKDTA4pJ6F2TPr9FtZf6X5xDNdMBezPy.jpeg',
            'storage/images/property/dummy/2020/10/07/lJv0tOLZh0DtAhkYmS28yvkljxb7pV3QCja8Qeek.jpeg',
            'storage/images/property/dummy/2020/10/07/rLwK2PbMINZaJyDUoQVvJIP0KHSjGs4DCfMM5CVH.jpeg',
            'storage/images/property/dummy/2020/10/07/t5YnlXPVqpfEJer3Ibusol2GwQWWyVKG20F82JNk.jpeg',
            'storage/images/property/dummy/2020/10/07/f5mA5GcbN1DQNqKswYHiiN9gNWlC0lreiE8Lkaxw.jpeg',
            'storage/images/property/dummy/2020/10/07/K8uGUT1EfyL2LFf7ig3wuaYcOPc31eXOtsLPiCb5.jpeg'
        );
        
        for($i=1; $i<=$seed; $i++){
            $property_id = DB::table('property')->insertGetId([
                'username' => Arr::random($username),
                'property_title' => 'Property Mewah '.$i,
                'property_description' => 'Deskripsi properti mewah ke-'.$i,
                'property_term' => Arr::random($term),
                'property_condition' => Arr::random($condition),
                'property_type' => Arr::random($type),
                'property_price' => rand(390000000, 2500000000),
                'property_address' => 'Alamat Property '.$i,
                'property_location' => Arr::random($location),
                'property_surface_area' => rand(70,300),
                'property_building_area' => rand(70,300),
                'property_bedroom_count' => rand(1,5),
                'property_bathroom_count' => rand(1,3),
                'property_parking_count' => rand(1,2),
                'property_slug' => Str::slug('Property Mewah '.$i, '_'),
                'property_status' => Arr::random($status),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            $image_count = rand(1, 4);
            
            for($j=1; $j<=$image_count; $j++){
                DB::table('property_images')->insert([
                    'property_id' => $property_id,
                    'images'=> Arr::random($images),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            $this->command->info('Property '.$i.'/'.$seed.' seeded!');

            sleep(1);
        }
    }
}
