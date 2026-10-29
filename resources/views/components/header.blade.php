<header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container position-relative d-flex align-items-center">
    <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
      <img src="{{ asset('assets/img/logodisperkim.png') }}" alt="Disperkim HST" />
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li class="dropdown">
          <a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{ route('tugasfungsi') }}">Tugas & Fungsi</a></li>
            <li><a href="{{ route('visimisi') }}">Visi & Misi</a></li>
            <li><a href="{{ route('strukturorganisasi') }}">Struktur Organisasi</a></li>
            <li><a href="{{ route('pejabatstruktural') }}">Data Pegawai</a></li>
          </ul>
        </li>
        <li><a href="{{ route('article') }}">Berita & Pengumuman</a></li>
        <li><a href="{{ route('map') }}">MapGis</a></li>
        <li><a href="{{ route('document') }}">Dokumen</a></li>
        <li class="dropdown">
          <a href="#"><span>Pelayanan</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="{{ route('aduan.create') }}">Usulan Masyarakat</a></li>
            <li><a href="{{ route('ajuan.create') }}">Ajuan Permohonan Pengukuran</a></li>
            <li><a href="{{ route('cek-status.form') }}">Cek Status</a></li>
             
          </ul>
        </li>
        <li><a href="{{ route('simulasire') }}">Edukasi dan Simulasi Renovasi</a></li>
        <li><a href="{{ route('faq') }}">FAQ</a></li>
        <li><a href="{{ route('kontak') }}">Kontak</a></li>
        {{-- <li><a href="{{ route('kontak') }}">Profil Pengembang</a></li> --}}
        {{-- <li><a href="{{ route('permintaan_peta.create') }}">Permintaan Peta</a></li> --}}
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>
