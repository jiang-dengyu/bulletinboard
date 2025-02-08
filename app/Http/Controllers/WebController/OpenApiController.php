<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenApiController extends Controller
{
    public function showWeather(){
        $apiKey = env();
        $city = 'Taipei';
        $url = "";

        $response = Http::get($url);

        if($response->successful()){
            $weather = $response->json();
            return view('openApi', compact('weather'));
        }else{
            return view('openApi', ['weather' =>null]);
        }
    }
}
