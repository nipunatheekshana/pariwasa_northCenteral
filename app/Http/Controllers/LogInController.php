<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LogInController extends Controller
{
    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password], true)) {
            // Authentication passed...
            // return "200";

            return ['status'=>'200','role'=>Auth::user()->role];
        } else {
            return "201";
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function resetPassword($id, $currentPassword, $newPassword)
    {
        $user = User::find($id);
        if ($user) {
            if (Hash::check($currentPassword, $user->password)) {
                $user->password = Hash::make($newPassword);
                $user->update();
                return true;
            }
        }
        return false;
    }
}
