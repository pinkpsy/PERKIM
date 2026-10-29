<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi & Simulasi Renovasi 3D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #e0f2f1;
            --secondary-color: #b2dfdb;
            --text-color: #004d40;
            --bg-color: #f7f9fc;
            --card-bg: #e0f2f1;
            --border-radius: 20px;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        
        /* Reset dan Box Sizing */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0;
        }
        
        /* 1. Kunci Utama Centering: HTML dan BODY harus 100% tinggi viewport */
        html, body {
            height: 100%; /* Penting agar body memiliki tinggi referensi */
        }

        /* 2. Flexbox Centering pada Body */
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: var(--bg-color); 
            color: var(--text-color); 
            
            /* -- SOLUSI VERTICAL CENTERING -- */
            display: flex; /* Aktifkan Flexbox */
            justify-content: center; /* Centering Horizontal */
            align-items: center; /* Centering Vertical */
            flex-direction: column; /* Konten diatur secara kolom jika ada header/footer */
        }
        
        main {
            padding: 20px; 
            /* Memastikan main mengambil ruang yang tersedia */
            flex-grow: 1;
            /* Untuk memastikan centering bekerja pada konten utama */
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .menu-section { 
            display: flex; 
            justify-content: center; 
            gap: 30px; 
            flex-wrap: wrap; 
            /* Hapus margin yang terlalu besar yang mengganggu centering vertikal */
            margin: 0; 
            padding: 20px; /* Kurangi padding agar tidak terlalu memaksa layout */
            max-width: 800px;
            width: 100%;
        }
        
        .menu-item-link { 
            text-decoration: none; 
            color: inherit; 
        }
        
        .menu-item {
            /* Sesuaikan flex-basis untuk tampilan responsif */
            flex-basis: 45%; 
            max-width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background-color: white;
            padding: 40px 80px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }
        
        .menu-item:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); 
        }
        
        .menu-icon-circle { 
            width: 100px; 
            height: 100px; 
            background-color: var(--secondary-color); 
            border-radius: 50%; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            font-size: 3em; 
            margin-bottom: 20px; 
        }
        
        .menu-label { 
            font-weight: 500; 
            font-size: 1.2em; 
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            .menu-item {
                flex-basis: 100%; /* Ambil lebar penuh di layar kecil */
                padding: 30px 40px;
            }
        }
    </style>
</head>
<body>
    <main>
        <section class="menu-section">
            <a href="{{ route('materi') }}" class="menu-item-link">
                <div class="menu-item">
                    <div class="menu-icon-circle"><i class="fas fa-book"></i></div>
                    <p class="menu-label">Materi</p>
                </div>
            </a>
            <a href="{{ route('simulasi') }}" class="menu-item-link">
                <div class="menu-item">
                    <div class="menu-icon-circle"><i class="fas fa-cubes"></i></div>
                    <p class="menu-label">Simulasi</p>
                </div>
            </a>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>