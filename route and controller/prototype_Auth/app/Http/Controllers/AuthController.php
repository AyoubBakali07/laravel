<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect('articles');
        }
        return back()->withInput(['email' => 'Invalid credentials.']);
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
        // return redirect()->route('dashboard');
    }
}
