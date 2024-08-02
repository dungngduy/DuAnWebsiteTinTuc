<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required'=> 'Vui lòng nhập tài khoản',
            'password.required'=> 'Vui lòng nhập mật khẩu',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->department_id;
            User::find($user->id)->update([
                'login_at' => now()
            ]);
            return response()->json([
                'user' => $user,
                'role' => $role,
            ]);
        } else {
            return response()->json(['message' => 'Tài khoản hoặc mật khẩu không đúng'], 401);
        }
    }

    public function logout(){
        Auth::logout();
        return response()->json(['message'=> 'Đăng xuất thành công']);
    }
}
