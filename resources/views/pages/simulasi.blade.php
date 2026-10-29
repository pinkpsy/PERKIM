<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi Renovasi 3D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* CSS Dasar */
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #f7f9fc; 
            color: #004d40; 
            margin: 0;
            
            /* Flebox untuk menyusun header, content, dan controls secara vertikal */
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
        }
        
        /* Styling Header Kembali */
        .header-back { 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            text-decoration: none; 
            color: #004d40; 
            font-size: 1.2rem; 
            font-weight: 500; 
            margin: 20px; 
            z-index: 50; 
        }
        
        .header-back:hover { 
            color: #000000; 
        }

        /* --- Kontainer Utama Pemusatan Gambar (Area Putih) --- */
        .simulation-container { 
            flex-grow: 1; /* Mengambil semua ruang vertikal di tengah */
            
            /* Kunci Pemusatan Gambar (Flexbox) */
            display: flex; 
            justify-content: center; /* Pusatkan Horizontal */
            align-items: center; /* Pusatkan Vertikal */
            
            width: 100vw; 
            background-color: #ffffff; /* Area Putih */
        }
        
        /* Styling Gambar itu sendiri */
        .gambar-rumah {
            max-width: 90%; 
            max-height: 80vh; 
            height: auto;
            display: block; 
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); Opsional */
        }
        
        /* Styling Panel Kontrol */
        .controls-panel { 
            /* Tidak perlu position: absolute lagi karena ini di flow normal */
            bottom: 20px; 
            padding: 15px; 
            background: rgba(255, 255, 255, 0.9); 
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05); 
            display: flex; 
            justify-content: center; /* Pusatkan tombol di tengah bawah */
            width: 100%;
            gap: 10px; 
        }
        
        .btn-style { 
            background-color: #b2dfdb; 
            color: #004d40; 
            border: none; 
            font-weight: 500; 
            padding: 8px 20px; 
            border-radius: 8px; 
            transition: background-color 0.2s; 
            cursor: pointer; 
        }
        
        .btn-style:hover { 
            background-color: #004d40; 
            color: #ffffff; 
        }
    </style>
</head>
<body>

    {{-- Header Kembali ke Beranda --}}
    <a href="{{ route('simulasire') }}" class="header-back">
        <i class="fas fa-arrow-left"></i>
        Kembali ke Beranda
    </a>

    <div class="simulation-container">
        
        <img src="{{ asset('assets/img/asds.png') }}" alt="Rumah Simulasi 3D" class="gambar-rumah">

    </div>
    
    <div class="controls-panel">
        <span class="fw-bold me-2 align-self-center">Ganti Lantai:</span>
        <button class="btn-style" onclick="changeColor('floor', 'tile')">Keramik (Abu)</button>
        <button class="btn-style" onclick="changeColor('floor', 'wood')">Kayu (Coklat)</button>
    </div>

    </body>
</html>