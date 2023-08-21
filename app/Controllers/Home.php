<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('homepage');
    }
    public function user()
    {
        return view('user');
    }
    public function products()
    {
        return view('products');
    }
    public function checkout()
    {
        return view('checkout');
    }
}
