<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUploadImages extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

    public function load()
    {
        $allpath = [];

    }

    private function getname()
    {

    }

}
