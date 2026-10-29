<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Ajuan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .info-box {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
        }
        .img-container {
            margin: 15px 0;
        }
        .img-container img {
            max-width: 100%;
            height: auto;
            max-height: 200px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .image-section {
            margin-top: 30px;
        }
        .image-section h3 {
            margin-bottom: 15px;
        }
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .image-item {
            width: 45%;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <h1>Detail Ajuan Permohonan</h1>
    
    <div class="info-box">
        <span class="label">Nama Pemohon:</span> {{ $ajuan->nama_pemohon}}
    </div>

    <div class="info-box">
        <span class="label">NIK Pemohon:</span> {{ $ajuan->nik}}
    </div>
    <div class="info-box">
        <span class="label">Nama Instansi:</span> {{ $ajuan->nama_instansi}}
    </div>
    
    <div class="info-box">
        <span class="label">Alamat :</span> {{ $ajuan->alamat }}
    </div>
    
    <div class="info-box">
        <span class="label">Nomor Telepon/WA :</span> {{ $ajuan->nomor }}
    </div>
    
    <div class="info-box">
        <span class="label">Status Pengajuan:</span> {{ $ajuan->status }}
    </div>
    
    <div class="info-box">
        <span class="label">Tanggal Pengajuan:</span> {{ $ajuan->created_at->format('d-m-Y H:i') }}
    </div>
    
  
    
    <!-- surat Section -->
    <div class="image-section">
        <h3>Surat Permohonan</h3>
        <div class="img-container">
            <p><strong>Surat Permohonan:</strong></p>
           <<a href="{{ asset('storage/' . $ajuan->surat) }}" target="_blank">Lihat Surat Permohonan</a>

    </div>
    
    
</body>
</html>