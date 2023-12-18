<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('member.register');
    }
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'name' => 'required',
        //     'phone_number' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);
        // $isEmailExist = User::where('email', $request->email)->exists();
        // if($isEmailExist){
        //     return back()
        //     ->withErrors([
        //         'email' => 'This email already exist / Emailnya sudah ada'
        //     ])->withInput();
        // }
        // $data['role'] = 'member';
        // $data['password'] = Hash::make($request->password);

        // User::create($data);

        // return back();

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:9',
                'phone_number' => 'required|min:12',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'role' => 'admin',
            ]);
            return redirect()->route('member.login');


    }
}
