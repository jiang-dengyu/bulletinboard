<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController\MemberController;
use App\Http\Controllers\RedisController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\QueueTestController;
use App\Http\Controllers\WebSocketController;


Route::get('/', function () {  return view('welcome');  });
Route::get('/mainPage', function(){  return view('mainPage');  })->name('home');
Route::get('/usersList', function() {  return view('usersList');  });

//Member
Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/export/default', [MemberController::class, 'memberExportXlsxDefault'])->name('member.exportXlsxDefault');
Route::get('/member/export/grouped', [MemberController::class, 'memberExportXlsxGroup'])->name('member.exportXlsxGrouped');

//OpenApi
Route::get('/open_api', [OpenApiController::class, 'showWeather']);

//Redis
Route::get('/redis-test', [RedisController::class, 'testRedis']);

//sftp
Route::get('/sftp-test', [UploadController::class, 'index'])->name('sftp.test');
Route::post('/upload', [UploadController::class, 'uploadFile'])->name('sftp.upload');

//queue test
Route::get('/queue-test', [QueueTestController::class, 'index'])->name('queue.test');
Route::post('/queue-send', [QueueTestController::class, 'sendEmail'])->name('queue.send');

//socket
Route::get('/websocket/index', [WebSocketController::class, 'index'])->name('chat.index');
Route::post('/websocket/send', [WebSocketController::class, 'sendMessage'])->name('chat.send');


