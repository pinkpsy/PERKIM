<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ajuan; 
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
class AjuanController extends Controller
{
     // Menampilkan halaman form pengajuan
     public function create()
     {
         return view('pages.ajuan');
     }
     
 
     // Menyimpan pengajuan
     public function store(Request $request)
     {
         // Validasi data yang dikirim
         $validated = $request->validate([
             'nama_pemohon' => 'required|string|max:255',
             'nik' => 'required|string|max:16', // Validasi NIK
             'nama_instansi' => 'required|string|max:255',
             'jabatan' => 'required|string|max:255',
             'alamat' => 'required|string',
             'keperluan' => 'required|in:Pengukuran,Survei Menggunakan Drone',
             'detail_keperluan' => 'required|string',
             'surat' => 'required|file|mimes:jpg,png,pdf|max:2048',
             'nomor' => 'required|string|max:15',
             
         ]);
 
         // Simpan file KTP Pelapor dan KTP Pemilik
         $suratPath = $request->file('surat')->store('surat', 'public');
         
 
        
         
 
         // Simpan data pengajuan ke database
         Ajuan::create([
             'nama_pemohon' => $request->nama_pemohon,
             'nik' => $request->nik, // Simpan NIK
             'nama_instansi' => $request->nama_instansi,
             'jabatan' => $request->jabatan,
             'alamat' => $request->alamat,
             'keperluan' => $request->keperluan,
             'detail_keperluan' => $request->detail_keperluan,
             'surat' => $suratPath,
             'nomor'=>$request->nomor,
             'status' => 'Menunggu Verifikasi', // Status default
         ]);
 
         // Redirect ke halaman pengajuan dengan pesan sukses
         return redirect()->route('ajuan.create')->with('success', 'Permohonan berhasil dikirim!');
     }
 
     // Menampilkan daftar semua pengajuan di halaman admin
     public function index()
     {
         // Mengambil semua data pengajuan
         $ajuans = Ajuan::all();
 
         // Mengirim data pengajuan ke view 'admin.ajuans'
         return view('admin.ajuans', compact('ajuans'));
     }
 
     // Menampilkan detail pengajuan
     public function show($id)
     {
         // Mengambil data pengajuan berdasarkan ID
         $ajuan = Ajuan::findOrFail($id);
 
         // Menampilkan halaman detail dengan data pengajuan
         return view('admin.ajuan_detail', compact('ajuan'));
     }
     // Fungsi untuk generate PDF dari detail pengajuan
     public function generatePDF($id)
     {
         // Mengambil data pengajuan berdasarkan ID
         $ajuan = Ajuan::findOrFail($id);
 
         // Generate PDF from the view
         $pdf = PDF::loadView('pdf.ajuan', compact('ajuan'));
 
         // Download the PDF
         return $pdf->download('permohonan_' . $ajuan->id . '.pdf');
     }
}
