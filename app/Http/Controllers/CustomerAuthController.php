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


    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.signin');
    }


    // Login Validation
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
        //dd($validator, $request->only('email', 'password'));
        // Attempt to log in the user
        //Auth::guard('customer')->attempt($request->only('email', 'password'));
            
            //return redirect()->route('home.index')
        $userData = null;
        if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){

            $userData = Auth::guard('customer')->user();
            // dd($userData);
            // Redirect to the home index route with user data in the session
            return redirect()->route('home.index')->with('userData', $userData);

            // $userData = Auth::guard('customer');
            // //dd($userData);
            // // return View::make('home.index')->with('userData',$userData);
            // $data = [
            //     'id' => 1
            // ];
            // return view('home',['userData' => $data]);
            // return redirect()->route('home.index')->with(['userData' => $data]);
        }

        // If login fails, return an error message
        return response()->json([
            'success' => false,
            'message' => 'Invalid login credentials.'
        ], 401);
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
