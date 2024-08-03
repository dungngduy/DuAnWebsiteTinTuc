<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class InFoUserConntroller extends Controller
{
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'name' => 'required|max:255',
            'email' => 'required|email',
        ],
        [
            'username.required'=> 'Vui lòng nhập tài khoản',
            'username.unique'=> 'Tên tài khoản đã tồn tại',

            'name.required'=> 'Vui lòng nhập họ tên',
            'name.max'=> 'Họ tên tối đa 255 ký tự',

            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không hợp lệ',
        ]);

        if ($request->hasFile('avatar')) {
            foreach ($request->file('avatar') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/uploads/users', $fileName);
                $fileNames = $fileName;
            }
        } else {
            $fileNames = $request->input('avatarExist');
        }

        User::find($id)->update([
            'username' => $request['username'],
            'name' => $request['name'],
            'avatar' => json_encode($fileNames),
            'email' => $request['email'],
        ]);

        if($request['change_password'] == true){
            $request->validate(
                [
                    'password' => 'required|confirmed',
                ],
                [
                    'password.required'=> 'Vui lòng nhập mật khẩu',
                    'password.confirmed'=> 'Xác nhận mật khẩu không đúng',
                ]
            );

            User::find($id)->update([
                'password' => Hash::make($request['password']),
                'change_password_at'=> now(),
            ]);
        }
    }
}
