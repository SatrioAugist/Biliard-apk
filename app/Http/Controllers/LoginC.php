<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogM;
use App\Models\User;

class LoginC extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);

        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => "User Telah LogIn"
        ]);

    }

    public function logout(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => "User Telah LogOut"
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
