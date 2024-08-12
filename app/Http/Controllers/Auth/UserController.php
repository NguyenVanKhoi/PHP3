<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function checkLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email', 'bail'],
            'password' => ['required', 'string', 'bail'],
        ]);
        // đăng nhập với email và mật khẩu
        if (Auth::attempt($data)) {
            if (Auth::user()->role == 0) {
                $request->session()->regenerate();
                // dd($request->session());
                return redirect()->route('admin.home');
            } else {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
        }
        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function checkRegister(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => ['required', 'string', 'bail'],
            'email' => ['required', 'string', 'email', 'bail', 'unique:users'],
            'password' => ['required', 'string', 'bail', 'confirmed', 'min:8'],
            'gender' => ['required', 'bail'],
            'birthdate' => ['required', 'bail'],
        ]);
        // tạo user mới đăng ký
        $user = User::query()->create($data);
        // login với user vừa tạo
        // Auth::login($user);
        // gen lại token cho user vừa đăng nhập
        // $request->session()->regenerate();
        return redirect()->intended('/login');
    }
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
}
