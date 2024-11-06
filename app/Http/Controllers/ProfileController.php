<?php

namespace App\Http\Controllers;


use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $customer = Customers::all();
        return view('profile.userProfile', compact('customer'));
    }

    public function edit()
    {
        // Retrieve the authenticated customer
        $customer = Auth::guard('customer')->user();

        // Return the edit address view with customer data
        return view('profile.userProfile#address', compact('customer'));
    }

    public function update(Request $request, array $data)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip' => 'required|string|max:5',
        ]);

        $customer = Auth::guard('customer')->user();
        // dd($request);

        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->country = $data['country'];
        $customer->state = $data['state'];
        $customer->zip = $request->zip;
        
        $customer->save();

        return redirect()->back()->with('success', 'Registration successful! Please login.');
    }

    public function edit_profile()
    {
        $customer = Customers::all();
        return view('profile.userProfile', compact('customer'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|max:10|min:10',
            
        ]);

        $customer = Auth::guard('customer')->user();

        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->phone = $request->phone;

        $customer->save();

        return redirect()->back();

        // return view('profile.update-profile-information-form', compact('customer'));
    }

}
