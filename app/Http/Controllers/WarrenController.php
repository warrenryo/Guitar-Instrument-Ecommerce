<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarrenController extends Controller
{
    public function index()
    {
        return view('warren.warren');
    }
}
