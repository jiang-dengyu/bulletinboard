<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    // 顯示表單
    public function create()
    {
        return view('member.create');
    } 
    // 處理表單送出
    public function store(Request $request)
    {
        // 驗證 (如需要可加上更多規則)
        $validatedData = $request->validate([
            'name'      => 'nullable|string',
            'birthdate' => 'nullable|date',
            'birthtime' => 'nullable',
            'phone'     => 'nullable|string',
            'address'   => 'nullable|string',
            'email'     => 'nullable|email',
        ]);

        // 儲存到資料庫
        Member::create($validatedData);

        // 重新導向到列表頁，或是其他需要的頁面
        return redirect()->route('member.index')->with('success', '會員資料已新增！');
    }

    // 顯示所有會員
    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }
}
