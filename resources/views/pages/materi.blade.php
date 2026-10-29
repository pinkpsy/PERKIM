<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi | Edukasi & Simulasi Renovasi 3D</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f9fc;
            color: #004d40;
        }
        .header-back {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: #004d40;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 30px;
        }
        .header-back:hover {
            color: #b2dfdb;
        }
        .content-card {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        .list-group-item {
            border: none;
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }
        .list-group-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .icon-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #e0f2f1;
            color: #004d40;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        .btn-download {
            background-color: #004d40;
            border-color: #004d40;
            transition: background-color 0.2s ease;
        }
        .btn-download:hover {
            background-color: #00251a;
            border-color: #00251a;
        }
        .embed-responsive {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* Rasio aspek 16:9 */
            height: 0;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        .embed-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <a href="{{ route('simulasire') }}" class="header-back">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Beranda
        </a>

        <div class="content-card">
            <h4 class="mb-4 text-center">E-book Pembelajaran</h4>
            <div class="list-group">
                <a href="/path/ke/ebook1.pdf" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3" download>
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-circle"><i class="fas fa-file-pdf"></i></div>
                        <span>Pengenalan Renovasi Rumah Modern</span>
                    </div>
                    <button class="btn btn-download text-white"><i class="fas fa-download me-2"></i>Unduh</button>
                </a>
                <a href="/path/ke/ebook2.pdf" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3" download>
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-circle"><i class="fas fa-file-pdf"></i></div>
                        <span>Tips & Trik Menghemat Biaya Renovasi</span>
                    </div>
                    <button class="btn btn-download text-white"><i class="fas fa-download me-2"></i>Unduh</button>
                </a>
            </div>
        </div>

        <div class="content-card">
            <h4 class="mb-4 text-center">Video Pembelajaran</h4>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="embed-responsive">
                        <iframe src="https://www.youtube.com/embed/videoid1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="embed-responsive">
                        <iframe src="https://www.youtube.com/embed/videoid2" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>