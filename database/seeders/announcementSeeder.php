<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\announcement_model;

class announcementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        announcement_model::factory()
            ->count(10)
            ->create();
    }
}
