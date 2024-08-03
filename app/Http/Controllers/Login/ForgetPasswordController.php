<?php

namespace App\Http\Controllers\Login;

use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function sendMail(Request $request)
    {
        $toMail = $request->input('email');
        $userSendMail = User::where('email', $toMail)->first();

        if ($userSendMail) {
            $newPassword = Str::random(8);
            $hashedPassword = Hash::make($newPassword);

            $userSendMail->password = $hashedPassword;
            $userSendMail->save();

            // Gửi mật khẩu mới qua email
            $message = 'Mật khẩu mới của bạn là: ' . $newPassword;
            $subject = 'AZ News đã nhận được yêu cầu cấp lại mật khẩu của bạn.';

            Mail::to($toMail)->send(new SendMail($message, $subject));

            return response()->json([
                'message' => 'Gửi yêu cầu thành công',
            ]);
        } else {
            return response()->json([
                'message' => 'Email không tồn tại',
            ], 404);
        }
    }
}
