<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ApiAuthController extends Controller
{
    public function __construct(){
        
    }

    public function login(AuthRequest $request){

        
        $credentials = $request->only('email','password');
            
        if (Auth::attempt($credentials)) {
            $admin = $request->user();
            $token=$request->user()->createToken('apiAuth')->plainTextToken;
           
            return response()->json([
                'admin'=>$admin,
                'token'=>$token,
                'message'=>'Đăng nhập thành công'
            ],200);
        }
        return  response()->json([
            'message'=>'Tài khoản hoặc mật khẩu không chính xác'
        ],401);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate(); 
        $request->session()->regenerateToken();  
    }
}