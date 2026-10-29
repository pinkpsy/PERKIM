<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Usulan</title>
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
    <h1>Detail Usulan Bedah Rumah</h1>
    
    <div class="info-box">
        <span class="label">Nama Pelapor:</span> {{ $aduan->nama_pelapor }}
    </div>
    
    <div class="info-box">
        <span class="label">Alamat Rumah:</span> {{ $aduan->alamat_rumah }}
    </div>
    
    <div class="info-box">
        <span class="label">Status Pengaduan:</span> {{ $aduan->status }}
    </div>
    
    <div class="info-box">
        <span class="label">Tanggal Pengaduan:</span> {{ $aduan->created_at->format('d-m-Y H:i') }}
    </div>
    
    <h3>Kriteria Rumah</h3>
    
    <table>
        <tr>
            <th>Kriteria</th>
            <th>Pilihan</th>
        </tr>
        <tr>
            <td>Atap</td>
            <td>{{ implode(', ', $aduan->kriteria_atap ?? []) }}</td>
        </tr>
        <tr>
            <td>Dinding</td>
            <td>{{ implode(', ', $aduan->kriteria_dinding ?? []) }}</td>
        </tr>
        <tr>
            <td>Lantai</td>
            <td>{{ implode(', ', $aduan->kriteria_lantai ?? []) }}</td>
        </tr>
    </table>
    
    <!-- KTP Section -->
    <div class="image-section">
        <h3>Dokumen KTP</h3>
        <div class="img-container">
            <p><strong>KTP Pelapor:</strong></p>
            <img src="{{ asset('storage/' . $aduan->ktp_pelapor) }}" alt="KTP Pelapor">
            {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents( asset('storage/' . $aduan->ktp_pelapor) )) }}" alt="KTP Pelapor"> --}}
        </div>
        
        <div class="img-container">
            <p><strong>KTP Pemilik Rumah:</strong></p>
            <img src="{{ asset('storage/' . $aduan->ktp_pemilik) }}" alt="KTP Pemilik Rumah">
        </div>
    </div>
    
    <!-- Foto Rumah Section -->
    <div class="image-section">
        <h3>Foto Rumah</h3>
        <div class="image-gallery">
            @if(is_array($aduan->foto_rumah))
                @foreach($aduan->foto_rumah as $index => $foto)
                    <div class="image-item">
                        <p><strong>Foto {{ $index + 1 }}:</strong></p>
                        <img src="{{ asset('storage/' . $foto) }}" alt="Foto Rumah {{ $index + 1 }}">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</body>
</html>