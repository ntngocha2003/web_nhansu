<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ApiAuthController extends Controller
{
    public function __construct(){
        
    }

    public function login(AuthRequest $request){
        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            $admin = $request->user();
            $token=$request->user()->createToken('apiAuth_token', ['*'], now()->addMinutes(60));
          
            return response()->json([
                'admin'=>$admin,
                'token'=>$token->plainTextToken,
                'token_expires_at'=>$token->accessToken->expires_at,
                'message'=>'Đăng nhập thành công'
            ],200);
        }
        return response()->json([
            'message'=>'Tài khoản hoặc mật khẩu không chính xác'
        ],422);
    }

    public function logout()  {
        auth()->user()->tokens()->delete();
        return ['message' => 'Bạn đã thoát ứng dụng và token đã xóa'];
 }
}