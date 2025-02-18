<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadFile(Request $request)
    {
        // 確保請求內有檔案
        if (!$request->hasFile('file')) {
            return response()->json(['error' => '沒有上傳檔案'], 400);
        }

        // 取得上傳的檔案
        $file = $request->file('file');

        // 設定 SFTP 上傳路徑
        $path = 'uploads/' . $file->getClientOriginalName();

        // 上傳到 SFTP
        Storage::disk('sftp')->put($path, file_get_contents($file));

        return response()->json(['message' => '檔案上傳成功！', 'path' => $path]);
    }
}
