<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view("auth.login");
    }

    public function postLogin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $token = $request->has("token");
        if (Auth::attempt($credentials, $token)) {
            $user = Auth::user();
            
            if ($user->role === 'admin') {
                return redirect()->route('admin.categories.index')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect("/")->with('success', 'Đăng nhập thành công');
            }
        } else {
            return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("login")->with("message","Bạn đã đăng xuất thành công");
    }


    public function register() {
        return view("auth.register");
    }
    public function postRegister(Request $request) {
         $check = User::query()->where("email", $request->email)->exists();
         if($check) {
            return redirect()->back()->with("message","Email đã tồn tại");
         }
         $credentials = $request->validate([
            "email"=> 'required|email',
            "name" => 'required',
            'password'=> "required"
         ],[
            "email.required"=> "Email không được bỏ trống",
            "email.email"=> "Phải đúng đình dạng",
            "name.required"=> "Tên không được bỏ trống",
            "password.required"=> "Mật khẩu không được bỏ trống"
         ]);
         $data = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
         ];
         User::create($data);
         return redirect()->route("login")->with("success","Đăng ký thành công");
    }
}
