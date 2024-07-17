<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')
            ->where('users.id', '!=', 1)
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->join('user_status', 'users.status_id', '=', 'user_status.id')
            ->select(
                'users.*',
                'departments.name as departments',
                'user_status.name as status'
            )
            ->get();
        return response()->json($users);
    }

    public function create()
    {
        $users_status = DB::table('user_status')
            ->select('id as value', 'name as label')
            ->get();
        $departments = DB::table('departments')
            ->select('id as value', 'name as label')
            ->get();
        return response()->json([
            'users_status' => $users_status,
            'departments' => $departments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status_id' => 'required',
            'username' => 'required|unique:users,username',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'department_id' => 'required',
            'password' => 'required|confirmed',
        ],
        [
            'status_id.required'=> 'Vui lòng chọn tình trạng',

            'username.required'=> 'Vui lòng nhập tài khoản',
            'username.unique'=> 'Tên tài khoản đã tồn tại',

            'name.required'=> 'Vui lòng nhập họ tên',
            'name.max'=> 'Họ tên tối đa 255 ký tự',

            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không hợp lệ',

            'department_id.required'=> 'Vui lòng chọn phòng ban',

            'password.required'=> 'Vui lòng nhập mật khẩu',
            'password.confirmed'=> 'Xác nhận mật khẩu không đúng',
        ]);

        // C1
        $users = $request->except('password_confimation');
        User::create($users);

        // C2
        // User::create([
        //     'status_id' => $request['status_id'],
        //     'username' => $request['username'],
        //     'name' => $request['name'],
        //     'email' => $request['email'],
        //     'department_id' => $request['department_id'],
        //     'password'=> $request['password'],
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::find($id);
        $users_status = DB::table('user_status')
            ->select('id as value', 'name as label')
            ->get();
        $departments = DB::table('departments')
            ->select('id as value', 'name as label')
            ->get();
        return response()->json([
            'users'=> $users,
            'users_status' => $users_status,
            'departments' => $departments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'name' => 'required|max:255',
            'email' => 'required|email',
            'department_id' => 'required',
        ],
        [
            'status_id.required'=> 'Vui lòng chọn tình trạng',

            'username.required'=> 'Vui lòng nhập tài khoản',
            'username.unique'=> 'Tên tài khoản đã tồn tại',

            'name.required'=> 'Vui lòng nhập họ tên',
            'name.max'=> 'Họ tên tối đa 255 ký tự',

            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Email không hợp lệ',

            'department_id.required'=> 'Vui lòng chọn phòng ban',
        ]);

        User::find($id)->update([
            'status_id' => $request['status_id'],
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'department_id' => $request['department_id'],
        ]);

        if($request['change_password'] === true){
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();
    }
}
