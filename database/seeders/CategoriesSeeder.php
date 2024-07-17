<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Categories')->insert([
            [
                'title' => 'Đời sống',
                'status' => '1',
            ],
            [
                'title' => 'Thể thao',
                'status' => '1',
            ],
            [
                'title' => 'Sức khỏe',
                'status' => '1',
            ],
            [
                'title' => 'Du lịch',
                'status' => '1',
            ],
        ]);
    }
}
