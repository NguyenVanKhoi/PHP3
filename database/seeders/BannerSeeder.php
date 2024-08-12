<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banners')->insert([
            [
                'banner' => 'banner/banner1.png',
            ],
            [
                'banner' => 'banner/banner2.png',
            ],
            [
                'banner' => 'banner/banner3.png',
            ],
            [
                'banner' => 'banner/banner4.png',
            ],
            [
                'banner' => 'banner/banner5.png',
            ],
        ]);
    }
}
