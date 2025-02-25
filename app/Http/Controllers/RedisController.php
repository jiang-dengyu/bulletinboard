<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class RedisController extends Controller
{
    public function testRedis()
    {
        try {
            // 設定 Redis Key-Value
            Redis::set('test_key', 'Hello from Redis Controller!');
            
            // 取得 Redis 的值
            $value = Redis::get('test_key');
            
            return response()->json([
                'status' => 'success',
                'message' => $value
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to connect to Redis',
                'error' => $e->getMessage()
            ]);
        }
    }
}
