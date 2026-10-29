<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembangController extends Controller
{
    public function index()
    {
        return view('pengembang');
    }
}
