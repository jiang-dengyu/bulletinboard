<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class authController extends Controller
{
    public function getAllUsers(){
        try{
            $results = User::all();
            return response()->json(['message'=>'Get users data successfully','Users data'=>$results],201);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);

        }   
    }
}