<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.login');
    }

    public function check(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin_email'    => 'required|email',
            'admin_password' =>  'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')->with('info', 'Invalid Email or Password');
        }

        $user = User::where('email', $request->admin_email)->first();

        if(!empty($user)){
            if(Hash::check($request->admin_password, $user->password)){
                   Auth::guard('backend')->login($user);
                   return redirect()->route('home');

            } else {
                return redirect()->route('login')->with('info', 'Invalid Password');
            } 
        }else {
            return redirect()->route('login')->with('info', 'Invalid Email');
        } 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('logout');
    }
}
