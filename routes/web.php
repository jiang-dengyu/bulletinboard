<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usersList', function() {
    return view('usersList');
});

//Member
Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member/export/default', [MemberController::class, 'memberExportXlsxDefault'])->name('member.exportXlsxDefault');
Route::get('/member/export/grouped', [MemberController::class, 'memberExportXlsxGroup'])->name('member.exportXlsxGrouped');