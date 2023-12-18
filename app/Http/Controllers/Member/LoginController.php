<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('member.auth');
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'member';

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return 'success';
            // return redirect()->route('member.dashboard');
        }else{
            return back()->withErrors([
                'credentials' => 'Your Credentials are wrong'
            ])->withInput();
        }
    }
    public function logout()
    {

    }
}
