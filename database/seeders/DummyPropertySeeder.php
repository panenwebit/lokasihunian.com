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
        $seed = 1000;
        $username = array('agen1', 'agen2', 'agen3', 'developera', 'developerb');
        $term = array('Beli', 'Sewa');
        $condition = array('Baru', 'Bekas');
        $type = array('Apartemen', 'Rumah', 'Tanah', 'Ruko', 'Vila');
        $status = array('Pending', 'Live', 'Expired', 'Sold', 'Archived');
        $location = array('31.71.03.1006', '35.78.08.1004', '32.73.13.1002', '32.71.05.1007', '34.04.13.2005');

        $images = array(
            '0lbR2Nr7oIM0tNrat3FEKBQ4Pfe1FvKmeVDq53cp.jpeg',
            '3EPmYfV12JsUXihtIgDRbp5LSlJuWd3qalCV3UU8.jpeg',
            'AE497D2pA05FpnJANpAo1qMl5qnzpbugmLMDUXXA.jpeg',
            'HlXvzifBGVoXbeFuMZjm1ZHlESjy5H6IIQr75UpX.jpeg',
            'InSHr27XWJ9cGiODUvXB3LvKOsLe5PlXpzyPBRfp.jpeg',
            'IWSmwwwlHEhN4TwtPVY6WnMDZ3h6EBd8FQu5mm2C.jpeg',
            'McRKEa59ewGCOImuVBhsZQVUFh4XDi4L8h1aRwV6.jpeg',
            'mGjG50qG1fINfkXJWrvBduw3TiPejiHOxzSOJP7n.jpeg',
            'mTuvRma9NZt6eVZzuqTNsixOnDjYL8yQZohAsqep.jpeg',
            'QeQqGFSEVYmTccHsWW55Y3rLMPjuE0zgL1tlYDlu.jpeg',
            'siSE5Bcql5dV3GTNk5XDdpNltvrp6nTUQo7WV3EU.jpeg',
            'WhpWyTi8X4mDZqSxLMAahlYC67oZvfmPyFKtenBg.jpeg',
            'Xt4E75gtYyDbLZBekGnfPNwTkainaxOOTfJUd7LJ.jpeg'
        );
        
        for($i=1; $i<=$seed; $i++){
            $property_id = DB::table('property')->insertGetId([
                'username' => Arr::random($username),
                'property_title' => 'Property Mewah '.$i,
                'property_description' => file_get_contents('http://loripsum.net/api/1/plaintext'),
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
        }
    }
}
