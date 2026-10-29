<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Usulan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        h2 {
            text-align: center;
            margin-bottom: 15px;
        }
        .aduan-card {
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
    <h2>Daftar Usulan Bedah Rumah</h2>
    <p>Tanggal Cetak: {{ now()->format('d-m-Y H:i') }}</p>
    @foreach($aduans as $aduan)
        <div class="aduan-card">
            <div><span class="label">Nama Pelapor:</span> {{ $aduan->nama_pelapor }}</div>
            <div><span class="label">Alamat Rumah:</span> {{ $aduan->alamat_rumah }}</div>
            <div><span class="label">Kriteria Atap:</span> {{ implode(', ', $aduan->kriteria_atap ?? []) }}</div>
            <div><span class="label">Kriteria Dinding:</span> {{ implode(', ', $aduan->kriteria_dinding ?? []) }}</div>
            <div><span class="label">Kriteria Lantai:</span> {{ implode(', ', $aduan->kriteria_lantai ?? []) }}</div>
            <div><span class="label">Status:</span> {{ $aduan->status }}</div>
            <div><span class="label">Tanggal:</span> {{ $aduan->created_at->format('d-m-Y') }}</div>

            <div style="margin-top: 10px;"><span class="label">KTP Pelapor:</span></div>
            @if($aduan->ktp_pelapor)
                <img class="img-preview" src="{{ public_path('storage/' . ltrim($aduan->ktp_pelapor, '/')) }}" alt="KTP Pelapor">
            @endif

            <div style="margin-top: 10px;"><span class="label">KTP Pemilik Rumah:</span></div>
            @if($aduan->ktp_pemilik)
                <img class="img-preview" src="{{ public_path('storage/' . ltrim($aduan->ktp_pemilik, '/')) }}" alt="KTP Pemilik Rumah">
            @endif

            <div style="margin-top: 10px;"><span class="label">Foto Rumah:</span></div>
            @if(is_array($aduan->foto_rumah))
                @foreach($aduan->foto_rumah as $foto)
                    @if($foto)
                        <img class="img-preview" src="{{ public_path('storage/' . ltrim($foto, '/')) }}" alt="Foto Rumah">
                    @endif
                @endforeach
            @endif
        </div>
        
    @endforeach
</body>
</html>