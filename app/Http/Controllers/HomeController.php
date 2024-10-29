<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admindash(){
        return view('admin.adminhome');
    }

    public function index() 
    {
        return view('home');
    }

    public function home(Array $userData){
        return view('home',['userData' => $userData]);
    }

}
