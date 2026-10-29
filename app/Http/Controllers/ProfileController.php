<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Models\PejabatStruktural;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function tugasfungsi():View
    {
        return view('pages.tugasfungsi');
    }

    public function visimisi():View
    {
        return view('pages.visimisi');
    }

    public function struktur():View
    {
        return view('pages.struktur');
    }

    public function pejabatstruktural():View
    {
        $pejabat = PejabatStruktural::paginate(20);
        $profile = Profile::with(['structuralPositions', 'formalEducations', 'nonFormalEducations'])->first();
        return view('pages.pejabatstruk', compact('pejabat', 'profile'));
    }
}
