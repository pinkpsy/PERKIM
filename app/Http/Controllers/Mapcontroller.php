<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class Mapcontroller extends Controller
{
    public function map():View
    {
        return view('pages.map');
    }
}
