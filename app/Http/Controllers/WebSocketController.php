<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class WebSocketController extends Controller
{
    public function index()
    {
        return view('chat'); // 顯示畫面
    }

    public function sendMessage(Request $request)
    {
        $message = $request->input('message', '預設訊息');
        event(new MessageSent($message));

        return response()->json([
            'status' => 'success',
            'message' => '訊息已發送'
        ]);
    }
}
