<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CustomerAuthController extends Controller
{
    // Show Register Form
    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    // Register the Customer and insert data into DB
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|max:10|min:10',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $customer = Customers::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('customer')->login($customer);

        return redirect()->route('home.index');
    }


    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.signin');
    }


    // Login Validation
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){
        //     $userData = Auth::guard('customer')->user();
        //     return redirect()->route('home.index')->with('userData', $userData);
        // }

        if (Auth::guard('customer')->attempt($request->only('email', 'password'), $request->remember)) {
            return redirect()->route('home.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }


    


    // LOGOUT
    public function logout(Request $request)
    {
        
        Auth::guard('customer')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }
}
