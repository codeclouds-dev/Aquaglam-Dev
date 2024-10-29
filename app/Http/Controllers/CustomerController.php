<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function show_customer()
    {

        $customers = Customers::orderBy('id', 'desc')->get();
        return view('admin.customers',compact('customers'));
    }

    

    public function edit_customer($id)
    {
        $customer = Customers::find($id);
        
        return view('admin.editCustomer', compact('customer'));

    }

    public function update_customer(Request $request,$id)
    {
      
      $customer = Customers::find($id);
      
      $customer->firstname = $request->firstname;
      $customer->lastname = $request->lastname;
      $customer->address = $request->address;
      $customer->city = $request->city;
      $customer->country = $request->country;
      $customer->state = $request->state;
      $customer->zip = $request->zip;
      $customer->phone = $request->phone;
      $customer->email = $request->email;
    //   $customer->stock = $request->stock;
        
      $customer->save();
      
      return redirect('customers')->with('status', 'Customer Details Updated!');
    }

    public function delete_product($id)
    {
        $customer = Customers::find($id);  

        $customer->delete();

        return redirect()->back()->with('status', 'Customer deleted successfully');
    }
}
