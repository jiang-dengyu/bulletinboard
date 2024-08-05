<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class announcementCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('announcementCategories')->insert([
            ['category_name' => 'category aa'],
            ['category_name' => 'category bb'],
            ['category_name' => 'category cc']
        ]);
    }
}
