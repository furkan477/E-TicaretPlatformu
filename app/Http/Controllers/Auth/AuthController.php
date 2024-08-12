<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function LoginShow(){
        return view("auth.login");
    }

    public function RegisterShow(){
        return view("auth.register");
    }

    public function Login(Request $request){
        $validation = $request->validate([
            "email"=> "required|email",
            "password"=> "required",
        ]);

        if(Auth::attempt(($validation))){
            $request->session()->regenerate();

            if(Auth::user()->is_admin == 1){
                return redirect()->intended("/admin/dashboard");
            } else{
                return redirect()->intended("/");
            }
        }

        return redirect()->withErrors("Kullanıcı Giriş Bilgilerinizi Yeniden Deneyiniz.");
    }

    public function Register(RegisterFormRequest $request){
        User::create([
            "name" => $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            "is_admin"=> "0",
        ]);

        return redirect("/login")->withSuccess("Kayıt İşlemi Başarıyla Gerçekleşmiştir.");
    }

    public function Logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login")->withSuccess("Çıkış İşlemi Başarılı Bir Şekilde Gerçekleşmiştir");
    }
}
