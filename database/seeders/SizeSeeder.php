<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert(
            [
                [
                    'size' => '39',
                ],
                [
                    'size' => '40',
                ],
                [
                    'size' => '41',
                ],
                [
                    'size' => '42',
                ],
                [
                    'size' => '43',
                ],
            ]
        );
    }
}
