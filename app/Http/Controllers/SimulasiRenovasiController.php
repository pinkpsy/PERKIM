<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiRenovasiController extends Controller
{
    public function simulasire()
    {
        return view('pages.simulasi_renovasi');
    }
}