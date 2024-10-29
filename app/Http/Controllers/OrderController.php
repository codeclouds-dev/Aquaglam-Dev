<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customers;
use App\Models\OrderItem;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show_orders()
    {

        $order = OrderDetails::all();
        $orderitems = OrderItem::all();
        $product = Product::all();
        $customer = Customers::all();
        return view('admin.orderDetails',compact('order','orderitems','product','customer'));
    }
}
