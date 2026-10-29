<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajuan;
use App\Models\Aduan;

class CekStatusController extends Controller
{
    public function index()
    {
        return view('cek-status.index');
    }

    public function check(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits_between:8,20',
        ]);

        $nik = $request->input('nik');

        $ajuans = Ajuan::where('nik', $nik)->get();
        $aduans = Aduan::where('nik', $nik)->get();

        return view('cek-status.result', compact('nik', 'ajuans', 'aduans'));
    }
}
