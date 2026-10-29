<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ config('app.name')  }}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    <link href="assets/img/favicon-hst.png" rel="icon" />
    <link href="assets/img/favicon-hst.png" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet" />

    <style>
        /* Style untuk profil detail */
        .profile-section {
            padding: 20px;
        }
        
        .profile-title {
            color: #ff6b6b;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .profile-subtitle {
            font-size: 16px;
            margin-bottom: 20px;
        }
        
        .main-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .profile-image {
            width: 200px;
            height: auto;
            margin-bottom: 20px;
        }
        
        .info-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .career-section {
            margin-top: 30px;
        }
        
        .career-title {
            color: #ff0000;
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        .career-item {
            margin-bottom: 15px;
        }

        /* Style untuk tabel pejabat */
        .table-container {
            padding: 20px;
        }
        
        .table-profile-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #ddd;
        }
        
        .table > tbody > tr > td {
            vertical-align: middle;
            padding: 15px;
        }
        
        .table > thead > tr > th {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        
        .department {
            font-weight: bold;
        }
        
        .position {
            color: #666;
            font-size: 0.9em;
        }

        /* Style untuk tab */
        .nav-tabs {
            margin-bottom: 20px;
        }
        
        .nav-tabs .nav-link {
            color: #495057;
        }
        
        .nav-tabs .nav-link.active {
            font-weight: bold;
        }
    </style>

    <!-- =======================================================
  * Template Name: Company
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body class="index-page">
    <x-header/>

    {{ $slot }}

    <x-footer/>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
