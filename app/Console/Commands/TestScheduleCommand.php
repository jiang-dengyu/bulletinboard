<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestScheduleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:schedule'; // Artisan 指令名稱

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '測試 Laravel 排程的指令'; //指令描述

    /**
     * Execute the console command.
     */
    public function handle()
    {
    $timestamp = now()->toDateTimeString();
    file_put_contents(storage_path('logs/schedule_log.txt'), "執行於: {$timestamp}\n", FILE_APPEND);
    $this->info("Laravel 排程測試執行於: {$timestamp}");
    }
}
