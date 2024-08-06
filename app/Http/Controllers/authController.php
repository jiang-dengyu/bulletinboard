<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authController extends Controller
{
    public function getAllUsers()
    {
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

    public function getUserBy(Request $request,string $param)
    {
        try{
            $results = User::findOrFail($param);
            return response()->json(['message'=>'Get user data successfully','User data'=>$results],201);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);

        }   
    }
    //註冊
    public function creatUser(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|max:255',
            ],
            [
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'Please provide a valid email address.',
                'email.unique' => 'This email is already taken.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 8 characters long.',
            ]
        );
        //驗證沒通過就結束
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);;
        }

        try{
            //通過就create使用者。密碼要bcrypt
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            return response()->json(['message'=>'Get user data successfully','new user data'=>$user],201);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }   
    }
    //登入
    public function signIn(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'password' => 'required|string|min:8|max:255',
            ],
            [
                'name.required' => 'The name field is required.',
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least 8 characters long.',
            ]
        );
        //輸入驗證沒通過就結束
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);;
        }

        try{
            //比對email跟password
            $user = User::where( 'email' , $request->email )->first();
            if ( !$user || !Hash::check( $request->password , $user->password )){
                return response()->json(['message'=>'email密碼不符合'], 422);
            }

            //發token
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json(['message'=>'Get user data successfully','name' => $user->name,'new token'=>$token],201);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'An error occurred.',
                'message' => $e->getMessage()
            ], 500);
        }   
    }
}