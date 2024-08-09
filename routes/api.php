<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\announcementController;
use App\Http\Controllers\authController;
use App\Http\Middleware\tokenAuth;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

/*users authentication*/
Route::get('/users',[authController::class,'getAllUsers']);
Route::get('/users/{param}',[authController::class,'getUserBy']);
Route::post('/users/signUp',[authController::class,'creatUser']);
Route::post('/users/signIn',[authController::class,'signIn']);

/*announcement*/
Route::post('/announcement',[ announcementController::class,'createAnnouncement']);
Route::get('/announcement/{id}',[ announcementController::class,'getAnnouncementById']);
Route::get('/announcement',[ announcementController::class,'getAllAnnouncements'])->middleware('auth:sanctum');
Route::put('/announcement/{id}',[ announcementController::class,'updateAnnouncement']); //remember to add _method = PUT and chose POST HTTP requet in form-data in postman 
Route::delete('/announcement/{id}',[ announcementController::class,'deleteAnnouncement']);
