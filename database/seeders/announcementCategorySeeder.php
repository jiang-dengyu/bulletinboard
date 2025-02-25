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
    // public function run(): void
    // {
    //     DB::table('announcementCategories')->delete();
    //     DB::statement('DBCC CHECKIDENT (announcementCategories, reseed, 0)');
    //     DB::table('announcementCategories')->insert([
    //         ['category_name' => 'category aa'],
    //         ['category_name' => 'category bb'],
    //         ['category_name' => 'category cc']
    //     ]);
    // }
        /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 刪除所有資料
        DB::table('announcementCategories')->truncate(); // 使用 truncate 會自動重設 AUTO_INCREMENT

        // 插入預設資料
        DB::table('announcementCategories')->insert([
            ['category_name' => 'category aa'],
            ['category_name' => 'category bb'],
            ['category_name' => 'category cc']
        ]);
    }
}
