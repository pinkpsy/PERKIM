<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link href="assets/img/favicon-hst.png" rel="icon" />
    <link href="assets/img/favicon-hst.png" rel="apple-touch-icon" />

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <link href="assets/css/main.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('lumap/css/leaflet.lumap.css') }}" />

    <style type="text/css">
     html, body {
  height: 100%;
  margin: 0;
  padding: 0;
  overflow: hidden; /* Menyembunyikan scrollbar horizontal dan vertikal */
}

.index-page {
  width: 100vw;  /* Pastikan mengisi seluruh lebar layar */
  height: 100vh;  /* Pastikan mengisi seluruh tinggi layar */
  margin: 0;
  padding: 0;
  overflow: hidden;  /* Menyembunyikan overflow */
}

#map {
  width: 100vw;  /* Menggunakan seluruh lebar layar */
  height: 100vh;  /* Menggunakan seluruh tinggi layar */
  margin: 0;      /* Hilangkan margin */
  padding: 0;     /* Hilangkan padding */
  display: block; /* Pastikan peta tampil sebagai blok */
  position: relative; /* Tambahkan ini */
  z-index: 1; /* Di bawah z-index sidebar (999) */
}

      /* =========================================== */
      /* Gaya untuk Sidebar Kiri (PENTING) */
      /* =========================================== */
      #sidebar {
        position: absolute;
        top: 0; /* Sesuaikan jika ada navbar di atasnya */
        left: 0;
        height: 100%; /* Penuh tinggi layar */
        width: 70px; /* Lebar sidebar, sesuaikan */
        background-color: #333; /* Warna latar belakang sidebar */
        color: white;
        z-index: 999; /* Di bawah navbar, di atas peta */
        padding-top: 0px; /* Jarak dari atas (sesuaikan jika navbar berubah) */
        overflow-y: auto; /* Aktifkan scroll jika konten lebih panjang */
        box-shadow: 2px 0 5px rgba(0,0,0,0.2);
        display: flex; /* Untuk menata item secara vertikal */
        flex-direction: column;
        align-items: center; /* Pusatkan ikon/teks di sidebar */
      }

      /* Gaya untuk tombol di sidebar */
      .sidebar-button {
        background: none;
        border: none;
        color: white;
        width: 100%; /* Lebar penuh sidebar */
        padding: 15px 0; /* Padding vertikal */
        font-size: 12px; /* Ukuran font lebih kecil untuk teks di bawah ikon */
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        display: flex; /* Untuk ikon di atas teks */
        flex-direction: column;
        align-items: center;
        text-align: center;
        text-decoration: none; /* Hilangkan underline jika defaultnya ada */
      }

      .sidebar-button:hover {
        background-color: #555;
        color: #fff;
      }

      .sidebar-button.active {
        background-color: #007bff; /* Warna biru saat aktif */
        color: white;
        font-weight: bold;
      }

      /* Gaya untuk ikon di dalam tombol sidebar */
      .sidebar-button i {
        font-size: 24px; /* Ukuran ikon */
        margin-bottom: 5px; /* Jarak antara ikon dan teks */
      }
/* Gaya untuk pop-up basemap */
#basemap-popup {
    position: fixed; /* Perbaiki posisi agar bisa digeser */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Awalnya di tengah */
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000; /* Pastikan di atas peta dan sidebar */
    display: none; /* Sembunyikan secara default */
    width: 300px; /* Lebar pop-up */
    max-height: 80vh; /* Tinggi maksimum pop-up */
    overflow-y: auto; /* Aktifkan scroll jika kontennya panjang */
    cursor: grab; /* Menunjukkan bahwa elemen bisa digeser */
}

#basemap-popup.basemap-popup-visible {
    display: block; /* Tampilkan saat class ini ditambahkan */
}

.basemap-popup-content h3 {
    margin-top: 0;
    margin-bottom: 15px;
    color: #333;
    text-align: center;
}

.basemap-options label {
    display: block; /* Setiap pilihan di baris baru */
    margin-bottom: 10px;
    cursor: pointer;
    font-size: 16px;
    color: #555;
}

.basemap-options input[type="radio"] {
    margin-right: 10px;
}

#close-basemap-popup {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

#close-basemap-popup:hover {
    background-color: #0056b3;
}

    </style>
  </head>
  <body>
    <div id="sidebar">
        <button class="sidebar-button" data-layer-id="baseMapToggle">
            <i class="bi bi-layers"></i> <span>Base Maps</span>
        </button>
        <button class="sidebar-button" data-layer-id="admDesa">
            <i class="bi bi-geo-fill"></i> <span>Batas Desa</span> </button>
        <button class="sidebar-button" data-layer-id="admKecamatan">
            <i class="bi bi-geo-alt"></i> <span>Batas Kecamatan</span>
        </button>
        <button class="sidebar-button" data-layer-id="admKabupaten">
            <i class="bi bi-map"></i> <span>Batas Kabupaten</span>
        </button>
        <button class="sidebar-button" data-layer-id="fasilitasUmum">
            <i class="bi bi-building"></i> <span>Fasilitas Umum</span>
        </button>
        <button class="sidebar-button" data-layer-id="search">
            <i class="bi bi-search"></i> <span>Search</span>
        </button>
        <button class="sidebar-button" data-layer-id="ruler">
            <i class="bi bi-rulers"></i> <span>Ruler</span>
        </button>
    </div>

    <div id="map"></div>

    <div id="basemap-popup" class="basemap-popup-hidden">
        <div class="basemap-popup-content">
            <h3>Pilih Base Map</h3>
            <div class="basemap-options">
                <label>
                    <input type="radio" name="basemap" value="osm" checked> OpenStreetMap
                </label>
                <label>
                    <input type="radio" name="basemap" value="cartoDark"> Carto Dark
                </label>
                <label>
                    <input type="radio" name="basemap" value="cartoVoyager"> Carto Voyager
                </label>
                <label>
                    <input type="radio" name="basemap" value="cartoPositron"> Carto Positron
                </label>
                <label>
                    <input type="radio" name="basemap" value="googleRoad"> Google Road Map
                </label>
                <label>
                    <input type="radio" name="basemap" value="googleTerrain"> Google Terrain & Roads
                </label>
                <label>
                    <input type="radio" name="basemap" value="googleSatellite"> Google Satellite & Roads
                </label>
                <label>
                    <input type="radio" name="basemap" value="bing"> Bing
                </label>
                <label>
                    <input type="radio" name="basemap" value="satellite"> Satellite
                </label>
                <label>
                    <input type="radio" name="basemap" value="satelliteAndRoads"> Satellite & Roads
                </label>
            </div>
            <button id="close-basemap-popup">Tutup</button>
        </div>
    </div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/main.js"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script type="text/javascript" src="{{ asset('lumap/js/leaflet.lumap.js') }}"></script>
    <script src="{{ asset('theme/js/script.js') }}"></script>

    <script>
      // Inisialisasi map
      let map = L.map('map', {
        zoomControl: false // Ini akan menghilangkan tombol zoom
      }).setView([-2.5841587, 115.3848204], 14); // Set view ke lokasi awal dan zoom level

      // ===========================================
      // DEFINISI BASEMAP LAYERS
      // ===========================================
      let osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
      });

      let cartoDark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}.png');
      let cartoVoyager = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png');
      let cartoPositron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}.png');
      // Perlu perhatikan bahwa untuk Google Maps memerlukan API Key jika penggunaan di production
      // Untuk tujuan development bisa menggunakan URL ini, namun ada batasan penggunaan atau TOS
      let googleRoad = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}');
      let googleTerrain = L.tileLayer('https://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}');
      let googleSatellite = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}');
      // Bing juga memerlukan API Key untuk penggunaan resmi. Ini hanyalah placeholder URL.
      let bing = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
      // Esri World Imagery
      let satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');
      // Esri World Street Map (seperti satelit dengan label jalan)
      let satelliteAndRoads = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}');

      // Menambahkan default base map (OpenStreetMap) ke peta saat pertama kali dimuat
      osm.addTo(map);

      // Menambahkan kontrol zoom ke peta (posisi di kanan atas)
      L.control.zoom({
          position: 'topright'
      }).addTo(map);

      // Menambahkan marker dengan logo pada koordinat tertentu
      let perkimIcon = L.icon({
        iconUrl: 'assets/img/logodisperkim.png', // Pastikan path ke logo ini benar
        iconSize: [120, 40], // ukuran icon
      });
      var marker = L.marker([-2.5841587, 115.3848204], { icon: perkimIcon }).addTo(map);
      marker.bindPopup('DISPERKIM');

      // ===========================================
      // FUNGSI DAN VARIABEL UNTUK LAYER GEOJSON (BATAS DESA)
      // ===========================================

      let admDesaLayer = null; // Variabel untuk menyimpan layer GeoJSON batas desa

      function loadAdmDesaLayer() {
          // Mengambil data GeoJSON dari file lokal
          fetch('{{ asset('assets/data/batas_desa.geojson') }}') // <--- PASTIKAN PATH INI SANGAT BENAR
              .then(response => {
                  if (!response.ok) {
                      // Jika ada masalah dengan respons HTTP (misal: file tidak ditemukan 404)
                      throw new Error(`Gagal memuat GeoJSON: status HTTP ${response.status}. Pastikan file ada di public/assets/data/batas_desa.geojson`);
                  }
                  return response.json(); // Menguraikan respons JSON
              })
              .then(data => {
                  // Membuat layer GeoJSON Leaflet dari data yang dimuat
                  admDesaLayer = L.geoJson(data, {
                      // Styling untuk poligon GeoJSON
                      style: function (feature) {
                          return {
                              color: '#00cc00',    // Warna garis (hijau)
                              weight: 2,           // Ketebalan garis
                              opacity: 0.8,        // Transparansi garis
                              fillColor: '#00cc00',// Warna isi poligon (hijau)
                              fillOpacity: 0.1     // Transparansi isi poligon
                          };
                      },
                      // Fungsi yang dijalankan untuk setiap fitur (desa) dalam GeoJSON
                      onEachFeature: function (feature, layer) {
                          // Pastikan fitur memiliki properti sebelum mencoba mengaksesnya
                          if (feature.properties) {
                              // Coba ambil nama desa dari properti 'NAMADESA'
                              // PENTING: GANTI 'NAMADESA' jika nama kolom di GeoJSON Anda berbeda!
                              let namaDesa = feature.properties.NAMADESA || feature.properties.name || 'Nama Tidak Diketahui';
                              layer.bindPopup("<b>Desa:</b> " + namaDesa);
                          } else {
                              layer.bindPopup("Batas Desa"); // Popup default jika properti tidak ditemukan
                          }
                      }
                  }).addTo(map); // Menambahkan layer GeoJSON langsung ke peta

                  // Opsional: Zoom peta ke batas seluruh layer GeoJSON setelah dimuat
                  // map.fitBounds(admDesaLayer.getBounds());
              })
              .catch(error => {
                  console.error('Error memuat data GeoJSON Batas Desa:', error);
                  alert('Terjadi kesalahan saat memuat data Batas Desa. Silakan cek konsol browser untuk detail.');
              });
      }

      // Event listener untuk tombol "Batas Desa" di sidebar
      const admDesaButton = document.querySelector('.sidebar-button[data-layer-id="admDesa"]');
      if (admDesaButton) {
          admDesaButton.addEventListener('click', function() {
              // Logika toggle (menampilkan/menyembunyikan) layer GeoJSON
              if (admDesaLayer && map.hasLayer(admDesaLayer)) {
                  map.removeLayer(admDesaLayer); // Hapus layer jika sudah ada di peta
                  admDesaLayer = null; // Set null agar bisa dimuat ulang di klik berikutnya
                  this.classList.remove('active'); // Hapus kelas active pada tombol
              } else {
                  loadAdmDesaLayer(); // Muat layer jika belum ada atau sudah dihapus
                  this.classList.add('active'); // Tambahkan kelas active pada tombol
              }
          });
      }

      // ===========================================
      // FUNGSI DAN VARIABEL UNTUK LAYER GEOJSON (BATAS KECAMATAN)
      // ===========================================

      let admKecamatanLayer = null; // Variabel untuk menyimpan layer GeoJSON batas kecamatan

      function loadAdmKecamatanLayer() {
          // Mengambil data GeoJSON dari file lokal
          fetch('{{ asset('assets/data/batas_kecamatan.geojson') }}') // <--- PASTIKAN PATH INI SANGAT BENAR
              .then(response => {
                  if (!response.ok) {
                      throw new Error(`Gagal memuat GeoJSON: status HTTP ${response.status}. Pastikan file ada di public/assets/data/batas_kecamatan.geojson`);
                  }
                  return response.json();
              })
              .then(data => {
                  admKecamatanLayer = L.geoJson(data, {
                      style: function (feature) {
                          return {
                              color: '#FF0000',    // Warna garis (merah)
                              weight: 3,           // Ketebalan garis
                              opacity: 0.9,        // Transparansi garis
                              fillColor: '#FF0000',// Warna isi poligon (merah)
                              fillOpacity: 0.05    // Transparansi isi poligon (lebih transparan)
                          };
                      },
                      onEachFeature: function (feature, layer) {
                          if (feature.properties) {
                              // PENTING: GANTI 'NAMAKECAMATAN' jika nama kolom di GeoJSON Anda berbeda!
                              let namaKecamatan = feature.properties.NAMAKECAMATAN || feature.properties.name || 'Nama Tidak Diketahui';
                              layer.bindPopup("<b>Kecamatan:</b> " + namaKecamatan);
                          } else {
                              layer.bindPopup("Batas Kecamatan");
                          }
                      }
                  }).addTo(map);

                  // map.fitBounds(admKecamatanLayer.getBounds()); // Opsional: Zoom ke batas layer
              })
              .catch(error => {
                  console.error('Error memuat data GeoJSON Batas Kecamatan:', error);
                  alert('Terjadi kesalahan saat memuat data Batas Kecamatan. Silakan cek konsol browser untuk detail.');
              });
      }

      // Event listener untuk tombol "Batas Kecamatan" di sidebar
      const admKecamatanButton = document.querySelector('.sidebar-button[data-layer-id="admKecamatan"]');
      if (admKecamatanButton) {
          admKecamatanButton.addEventListener('click', function() {
              if (admKecamatanLayer && map.hasLayer(admKecamatanLayer)) {
                  map.removeLayer(admKecamatanLayer);
                  admKecamatanLayer = null;
                  this.classList.remove('active');
              } else {
                  loadAdmKecamatanLayer();
                  this.classList.add('active');
              }
          });
      }

      // ===========================================
      // FUNGSI DAN VARIABEL UNTUK LAYER GEOJSON (BATAS KABUPATEN)
      // ===========================================

      let admKabupatenLayer = null; // Variabel untuk menyimpan layer GeoJSON batas kabupaten

      function loadAdmKabupatenLayer() {
          // Mengambil data GeoJSON dari file lokal
          fetch('{{ asset('assets/data/batas_kabupaten.geojson') }}') // <--- PASTIKAN PATH INI SANGAT BENAR
              .then(response => {
                  if (!response.ok) {
                      throw new Error(`Gagal memuat GeoJSON: status HTTP ${response.status}. Pastikan file ada di public/assets/data/batas_kabupaten.geojson`);
                  }
                  return response.json();
              })
              .then(data => {
                  admKabupatenLayer = L.geoJson(data, {
                      style: function (feature) {
                          return {
                              color: '#0000FF',    // Warna garis (biru)
                              weight: 4,           // Ketebalan garis (lebih tebal dari kecamatan)
                              opacity: 0.9,        // Transparansi garis
                              fillColor: '#0000FF',// Warna isi poligon (biru)
                              fillOpacity: 0.02    // Transparansi isi poligon (sangat transparan)
                          };
                      },
                      onEachFeature: function (feature, layer) {
                          if (feature.properties) {
                              // PENTING: GANTI 'NAMAKABUPATEN' jika nama kolom di GeoJSON Anda berbeda!
                              let namaKabupaten = feature.properties.NAMAKABUPATEN || feature.properties.name || 'Nama Tidak Diketahui';
                              layer.bindPopup("<b>Kabupaten:</b> " + namaKabupaten);
                          } else {
                              layer.bindPopup("Batas Kabupaten");
                          }
                      }
                  }).addTo(map);

                  // map.fitBounds(admKabupatenLayer.getBounds()); // Opsional: Zoom ke batas layer
              })
              .catch(error => {
                  console.error('Error memuat data GeoJSON Batas Kabupaten:', error);
                  alert('Terjadi kesalahan saat memuat data Batas Kabupaten. Silakan cek konsol browser untuk detail.');
              });
      }

      // Event listener untuk tombol "Batas Kabupaten" di sidebar
      const admKabupatenButton = document.querySelector('.sidebar-button[data-layer-id="admKabupaten"]');
      if (admKabupatenButton) {
          admKabupatenButton.addEventListener('click', function() {
              if (admKabupatenLayer && map.hasLayer(admKabupatenLayer)) {
                  map.removeLayer(admKabupatenLayer);
                  admKabupatenLayer = null;
                  this.classList.remove('active');
              } else {
                  loadAdmKabupatenLayer();
                  this.classList.add('active');
              }
          });
      }


      // ===========================================
      // FUNGSI DAN LOGIKA POP-UP BASEMAP
      // ===========================================

      const basemapToggleButton = document.querySelector('.sidebar-button[data-layer-id="baseMapToggle"]');
      const basemapPopup = document.getElementById('basemap-popup');
      const closeBasemapPopupButton = document.getElementById('close-basemap-popup');
      const basemapRadioOptions = document.querySelectorAll('#basemap-popup input[name="basemap"]');

      let currentBasemapLayer = osm; // Default basemap saat ini

      // Fungsionalitas Drag Pop-up
      let isDragging = false;
      let offsetX, offsetY;

      basemapPopup.addEventListener('mousedown', (e) => {
          if (e.target.tagName === 'INPUT' || e.target.tagName === 'LABEL' || e.target.id === 'close-basemap-popup' || e.target.tagName === 'BUTTON') {
              return;
          }
          isDragging = true;
          offsetX = e.clientX - basemapPopup.getBoundingClientRect().left;
          offsetY = e.clientY - basemapPopup.getBoundingClientRect().top;
          basemapPopup.style.cursor = 'grabbing';
      });

      document.addEventListener('mousemove', (e) => {
          if (!isDragging) return;
          basemapPopup.style.transform = 'none';
          basemapPopup.style.position = 'fixed';
          const newX = e.clientX - offsetX;
          const newY = e.clientY - offsetY;
          const maxX = window.innerWidth - basemapPopup.offsetWidth;
          const maxY = window.innerHeight - basemapPopup.offsetHeight;
          basemapPopup.style.left = `${Math.max(0, Math.min(newX, maxX))}px`;
          basemapPopup.style.top = `${Math.max(0, Math.min(newY, maxY))}px`;
      });

      document.addEventListener('mouseup', () => {
          isDragging = false;
          basemapPopup.style.cursor = 'grab';
      });

      // Fungsi untuk membuka pop-up basemap
      if (basemapToggleButton) {
          basemapToggleButton.addEventListener('click', function() {
              basemapPopup.classList.add('basemap-popup-visible');
              basemapPopup.style.left = '50%';
              basemapPopup.style.top = '50%';
              basemapPopup.style.transform = 'translate(-50%, -50%)';
          });
      }

      // Fungsi untuk menutup pop-up basemap
      if (closeBasemapPopupButton) {
          closeBasemapPopupButton.addEventListener('click', function() {
              basemapPopup.classList.remove('basemap-popup-visible');
          });
      }

      // Event listener untuk mengganti basemap saat pilihan radio berubah di pop-up
      basemapRadioOptions.forEach(radio => {
          radio.addEventListener('change', function() {
              if (this.checked) {
                  if (currentBasemapLayer && map.hasLayer(currentBasemapLayer)) {
                      map.removeLayer(currentBasemapLayer);
                  }
                  switch (this.value) {
                      case 'osm':
                          currentBasemapLayer = osm;
                          break;
                      case 'cartoDark':
                          currentBasemapLayer = cartoDark;
                          break;
                      case 'cartoVoyager':
                          currentBasemapLayer = cartoVoyager;
                          break;
                      case 'cartoPositron':
                          currentBasemapLayer = cartoPositron;
                          break;
                      case 'googleRoad':
                          currentBasemapLayer = googleRoad;
                          break;
                      case 'googleTerrain':
                          currentBasemapLayer = googleTerrain;
                          break;
                      case 'googleSatellite':
                          currentBasemapLayer = googleSatellite;
                          break;
                      case 'bing':
                          currentBasemapLayer = bing;
                          break;
                      case 'satellite':
                          currentBasemapLayer = satellite;
                          break;
                      case 'satelliteAndRoads':
                          currentBasemapLayer = satelliteAndRoads;
                          break;
                      default:
                          currentBasemapLayer = osm;
                  }
                  map.addLayer(currentBasemapLayer);
              }
          });
      });

      // Memastikan basemap default (osm) terpilih saat halaman dimuat
      document.querySelector('#basemap-popup input[value="osm"]').checked = true;

    </script>
    
  </body>
</html>