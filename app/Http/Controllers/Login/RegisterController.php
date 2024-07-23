<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ],
        [
            'username.required'=> 'Vui lòng nhập tài khoản',
            'username.unique'=> 'Tên tài khoản đã tồn tại',

            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không hợp lệ',

            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.confirmed'=> 'Xác nhận mật khẩu không đúng',
        ]);

        User::create([
            'status_id' => 1,
            'username' => $request['username'],
            'email' => $request['email'],
            'department_id' => 2,
            'password'=> $request['password'],
        ]);

        return response()->json([
            'message'=> 'Đăng ký tài khoản thành công',
        ]);
    }
}
