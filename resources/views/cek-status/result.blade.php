<x-layout>
	<div class='min-vh-100 d-flex flex-column'>
	<div class="container mt-4 flex-grow-1">
    <h3>Hasil Pengecekan NIK: {{ $nik }}</h3>

    <h5 class="mt-4">Daftar Ajuan</h5>
    @forelse ($ajuans as $ajuan)
        <div class="border p-3 mb-2">
            <strong>Nama:</strong> {{ $ajuan->nama_pemohon }}<br>
            <strong>Status:</strong> {{ $ajuan->status }}
        </div>
    @empty
        <p>Tidak ada ajuan ditemukan.</p>
    @endforelse

    <h5 class="mt-4">Daftar Usulan</h5>
    @forelse ($aduans as $aduan)
        <div class="border p-3 mb-2">
            <strong>Nama:</strong> {{ $aduan->nama_pelapor }}<br>
            <strong>Status:</strong> {{ $aduan->status }}
        </div>
    @empty
        <p>Tidak ada aduan ditemukan.</p>
    @endforelse

    <a href="{{ route('cek-status.form') }}" class="btn btn-secondary mt-3">Cek Lagi</a>
</div>
	</div>
</x-layout>
