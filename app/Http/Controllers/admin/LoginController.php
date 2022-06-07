<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;

class LoginController extends Controller
{
    public function index()
    { 
        return view('admin.Login.index');
    }

    public function adminLogin(Request $request ) 
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return redirect()->intended('Dashboard');
        } else{
            return redirect()->back()->withInput()->with('error','Email and password invalid!');
        }                   
    }

    public function logout()
    {
         auth()->guard('admin')->logout();
        \Session::flush();       
        return redirect(url('admin'));
    }

}


 
 