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
            'question' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, doloribus.?',
            'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident harum excepturi odit numquam eum sint temporibus recusandae. Quibusdam, perferendis quas?',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'question' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non quam neque pariatur a consequuntur. Magnam?',
            'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi dignissimos perferendis explicabo assumenda nobis ipsum.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'question' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam vitae maxime distinctio esse repudiandae illum officiis velit expedita corrupti aspernatur, doloribus at dolores quam! Ipsa!',
            'answer' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ea quod doloremque magni eligendi explicabo quis suscipit quas impedit et. Adipisci veniam recusandae quas provident assumenda ullam ab vitae libero, impedit accusantium asperiores aspernatur deleniti odit corporis quae repellat esse.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('faqs')->insert([
            'question' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam dolor expedita fugit amet. Eligendi cumque explicabo atque magni dolorem totam nulla ducimus iure? Delectus sapiente modi reiciendis inventore saepe aliquam! Aperiam reprehenderit deleniti optio nisi.',
            'answer' => 'Lorem ipsum dolor sit amet.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]); 
    }
}
