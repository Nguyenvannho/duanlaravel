<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {

            return view('admin.login');
        }
    }
    public function postLogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email không đúng",
            "password.exists" => "Mật khẩu không đúng",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            alert()->success('Đăng nhập thành công!');
            return redirect()->route('home');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function forgot_password()
    {
        return view('admin.Auth.forgot_password');
    }
    public function post_forgot_password(Request $request)//quen mat khau
    {
        $customer = User::where('email', $request->email)->first();
        if ($customer) {
            $pass = Str::random(6);
            $customer->password = bcrypt($pass);
            $customer->save();
            $data = [
                'name' => $customer->name,
                'pass' => $pass,
                'email' => $customer->email,
            ];
            Mail::send('admin.Auth.password', compact('data'), function ($email) use ($customer) {
                $email->subject('Shop 4Men');
                $email->to($customer->email, $customer->name);
            });
        }
        return redirect()->route('login');
    }
}