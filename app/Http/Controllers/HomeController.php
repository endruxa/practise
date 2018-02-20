<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.home.home');
    }

    public function about()
    {
        return view('layouts.home.about');
    }

    public function post()
    {
        return view('layouts.home.post');
    }

    public function contact()
    {
        return view('layouts.home.contact');
    }
}
