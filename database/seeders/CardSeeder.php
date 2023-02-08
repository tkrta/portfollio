<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
                'color' => '#7cfef0',
                'price' => '0',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
         
        DB::table('cards')->insert([
                'color' => '#2ceaa3',
                'price' => '20',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
        DB::table('cards')->insert([
                'color' => '#fad4d8',
                'price' => '20',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
        DB::table('cards')->insert([
                'color' => '#de3c4b',
                'price' => '30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
        DB::table('cards')->insert([
                'color' => '#25283d',
                'price' => '30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
