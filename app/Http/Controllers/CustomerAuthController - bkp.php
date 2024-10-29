<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Customers::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home.index')->with('success', 'Registration successful! Please login.');
    }

    public function showLoginForm()
    {
        return view('auth.signin');
    }

    public function login(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // If validation fails, return error messages as JSON
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.',
                'errors' => $validator->errors()
            ], 422);
        }

        // Attempt to log in the user
        if (Auth::guard('customer')->attempt($request->only('email', 'password'))) {
            
            return redirect()->route('home.index');
            
            // return [
            //     'success' => true,
            //     'message' => 'Login successful!',
            //     'redirect' => route('home'),
            // ];
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Login successful!',
            //     'redirect' => route('home'), // Redirect URL for home page
            // ]);
        }

        // If login fails, return an error message
        return response()->json([
            'success' => false,
            'message' => 'Invalid login credentials.'
        ], 401);
    }

    // public function index(){
    //     $customer = Auth::guard('customer')->user();

    //     // Pass the customer to the dashboard view
    //     return view('home', compact('customer'));
    // }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.signin');
    }
}
