<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Cloudinary;

class StampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611729/portfolio/stamps/stamp1_wrabne.png',
                'name' => 'OKスタンプ',
                'price' => '0',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
                
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611745/portfolio/stamps/stamp2_xw8t4e.png',
                'name' => '済スタンプ',
                'price' => '10',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
                
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611762/portfolio/stamps/stamp3_naraqd.png',
                'name' => '足跡スタンプ',
                'price' => '20',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
                
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611763/portfolio/stamps/stamp6_d0jw2m.png',
                'name' => 'お星様スタンプ',
                'price' => '30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
                
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611763/portfolio/stamps/stamp4_qmwako.png',
                'name' => '燃えるスタンプ',
                'price' => '30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
                
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611763/portfolio/stamps/stamp5_q46mk2.png',
                'name' => 'チェックマークスタンプ',
                'price' => '20',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
                
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611763/portfolio/stamps/stamp7_diinji.png',
                'name' => '梅スタンプ',
                'price' => '30',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
                
        DB::table('stamps')->insert([
                'image_path' => 'https://res.cloudinary.com/dmjq6lz1y/image/upload/v1675611763/portfolio/stamps/stamp8_br87jz.png',
                'name' => '王様スタンプ',
                'price' => '100',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                ]);
    }
}
