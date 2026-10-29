<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Permohonan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        .ajuan-card {
            border: 1px solid #ccc;
            padding: 16px;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        .label {
            font-weight: bold;
        }
        .img-preview {
            margin: 10px 0;
            max-width: 250px; /* Sesuaikan sesuai kebutuhan */
            max-height: 200px;
        }
    </style>
</head>
<body>
    <h2>Daftar Permohonan</h2>
    <p>Tanggal Cetak: {{ now()->format('d-m-Y H:i') }}</p>
    @foreach($ajuans as $ajuan)
        <div class="ajuan-card">
					<div><span class="label" style="font-weight: bold;">Nama Pemohon:</span> {{ $ajuan->nama_pemohon }}</div>
					<div><span class="label" style="font-weight: bold;">NIK Pemohon:</span> {{ $ajuan->nik }}</div>
                    <div><span class="label" style="font-weight: bold;">Nama Instansi:</span> {{ $ajuan->nama_instansi }}</div>
					<div><span class="label" style="font-weight: bold;">Jabatan Pemohon:</span> {{ $ajuan->jabatan }}</div>
					<div><span class="label" style="font-weight: bold;">Alamat Instansi/Lembaga:</span> {{ $ajuan->alamat }}</div>
					<div><span class="label" style="font-weight: bold;">Keperluan:</span> {{ $ajuan->keperluan }}</div>
					<div><span class="label" style="font-weight: bold;">Detail Keperluan:</span> {{ $ajuan->detail_keperluan }}</div>
					<div><span class="label" style="font-weight: bold;">Nomor Telepon/WA:</span> {{ $ajuan->nomor }}</div>
					<div><span class="label" style="font-weight: bold;">Status Pengajuan:</span> {{ $ajuan->status }}</div>
					<div><span class="label" style="font-weight: bold;">Tanggal Pengajuan:</span> {{ $ajuan->created_at->format('d-m-Y H:i') }}</div>

            <!-- Surat Permohonan -->
						<div style="margin-top: 10px;"><span class="label" style="font-weight: bold;">Surat Permohonan:</span></div>
						@if($ajuan->surat)
                        <a href="{{ asset('storage/' . $ajuan->surat) }}" target="_blank">Lihat Surat Permohonan</a>


						@endif



        </div>
    @endforeach
</body>
</html>