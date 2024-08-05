<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\announcementController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/announcement',[ announcementController::class,'createAnnouncement']);
Route::get('/announcement',[ announcementController::class,'getAllAnnouncements']);
Route::put('/announcement/{id}',[ announcementController::class,'updateAnnouncement']);
Route::delete('/announcement/{id}',[ announcementController::class,'deleteAnnouncement']);
