<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AduanController extends Controller
{ 
    // Menampilkan halaman form pengaduan
    public function create()
    {
        return view('pages.aduan');
    }
    

    // Menyimpan pengaduan
    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'nik' => 'required|string|max:255', // Validasi NIK
            'ktp_pelapor' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'alamat_rumah' => 'required|string',
            'ktp_pemilik' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'foto_rumah.*' => 'required|image|mimes:jpg,png|max:2048',
            'kriteria_atap' => 'nullable|array',
            'kriteria_dinding' => 'nullable|array',
            'kriteria_lantai' => 'nullable|array',
        ]);

        // Simpan file KTP Pelapor dan KTP Pemilik
        $ktpPelaporPath = $request->file('ktp_pelapor')->store('ktp_pelapor', 'public');
        $ktpPemilikPath = $request->file('ktp_pemilik')->store('ktp_pemilik', 'public');

        // Simpan foto rumah (4 sisi)
        $fotoPaths = [];
        if ($request->hasFile('foto_rumah')) {
            foreach ($request->file('foto_rumah') as $foto) {
                $fotoPaths[] = $foto->store('foto_rumah', 'public');
            }
        }

        // Simpan data pengaduan ke database
        Aduan::create([
            'nama_pelapor' => $request->nama_pelapor,
            'nik' => $request->nik, // Simpan NIK
            'ktp_pelapor' => $ktpPelaporPath,
            'alamat_rumah' => $request->alamat_rumah,
            'ktp_pemilik' => $ktpPemilikPath,
            'foto_rumah' => $fotoPaths,  // Menyimpan path foto sebagai array
            'kriteria_atap' => $request->kriteria_atap ?? [],
            'kriteria_dinding' => $request->kriteria_dinding ?? [],
            'kriteria_lantai' => $request->kriteria_lantai ?? [],
            'status' => 'Menunggu Verifikasi', // Status default
        ]);

        // Redirect ke halaman pengaduan dengan pesan sukses
        return redirect()->route('aduan.create')->with('success', 'Pengaduan berhasil dikirim!');
    }

    // Menampilkan daftar semua pengaduan di halaman admin
    public function index()
    {
        // Mengambil semua data pengaduan
        $aduans = Aduan::all();

        // Mengirim data pengaduan ke view 'admin.aduans'
        return view('admin.aduans', compact('aduans'));
    }

    // Menampilkan detail pengaduan
    public function show($id)
    {
        // Mengambil data pengaduan berdasarkan ID
        $aduan = Aduan::findOrFail($id);

        // Menampilkan halaman detail dengan data pengaduan
        return view('admin.aduan_detail', compact('aduan'));
    }
    // Fungsi untuk generate PDF dari detail pengaduan
    public function generatePDF($id)
    {
        // Mengambil data pengaduan berdasarkan ID
        $aduan = Aduan::findOrFail($id);

        // Generate PDF from the view
        $pdf = Pdf::loadView('pdf.aduan', compact('aduan'));

        // Download the PDF
        return $pdf->download('pengaduan_' . $aduan->id . '.pdf');
    }
}