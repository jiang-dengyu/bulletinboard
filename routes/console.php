<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// **註冊測試排程**
app()->booted(function () {
    $schedule = app(Schedule::class);
    // 你的 `test:schedule` 每分鐘執行一次
    $schedule->command('test:schedule')->everyMinute();
});