<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;

class QueueTestController extends Controller
{
    public function index()
    {
        return view('queueTest'); // 顯示畫面
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->email;

        // 將任務送入佇列
        SendEmailJob::dispatch($email);

        return redirect()->route('queue.test')->with('success', '郵件已加入佇列！');
    }
}
