<x-layout>
	<div class="container mt-5 mb-5">
	<!-- Form Pengajuan Masyarakat -->
	<div class="container mt-5">
			<h2 class="text-center">Form Pengajuan Permohonan Pengkuran dan Survei Menggunakan Drone untuk Instansi/Lembaga yang Memerlukan</h2>

			@if(session('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
			@endif

			<form action="{{ route('ajuan.store') }}" method="POST" enctype="multipart/form-data">
					@csrf

					<!-- Nama Pelapor -->
					<div class="mb-3">
							<label for="nama_pemohon" class="form-label">Nama Pemohon</label>
							<input type="text" class="form-control" name="nama_pemohon" required placeholder="Masukkan Nama Pemohon">
					</div>
					{{-- nik pelapor --}}
					<div class="mb-3">
						<label for="nik" class="form-label">NIK Pemohon</label>
						<input type="text" class="form-control" name="nik"  maxlength="16" pattern="\d{16}" required placeholder="Masukkan NIK Pemohon">
				</div>
				<div class="mb-3">
					<label for="nama_instansi" class="form-label">Nama Instansi</label>
					<input type="text" class="form-control" name="nama_instansi" required placeholder="Masukkan Nama Instansi">
			</div>
			

				
					<div class="mb-3">
							<label for="jabatan" class="form-label">Jabatan Pemohon</label>
							<input type="text" class="form-control" name="jabatan" required placeholder="Masukkan Jabatan Pemohon">
					</div>

					<!-- Alamat Rumah -->
					<div class="mb-3">
							<label for="alamat" class="form-label">Alamat Instansi/Lembaga</label>
							<input type="text" class="form-control" name="alamat" required placeholder="Masukkan Alamat Instansi/Lembaga">
					</div>
					<div class="mb-3">
							<label for="keperluan" class="form-label">Keperluan</label>
							<select class="form-select" name="keperluan" required>
								<option selected value="Pilih">Pilih</option>
								<option value="Pengukuran">Pengukuran</option>
								<option value="Survei Menggunakan Drone">Survei Menggunakan Drone</option>
						</select>
					</div>
					<div class="mb-3">
							<label for="detail_keperluan" class="form-label">Detail Keperluan</label>
							<input type="text" class="form-control" name="detail_keperluan" required placeholder="Masukkan Detai Keperluan">
					</div>

					
					<div class="mb-3">
							<label for="surat" class="form-label">Surat Permohonan</label>
							<input type="file" class="form-control" name="surat" accept=".jpg, .png, .jpeg, .pdf" required>
					</div>
					
					<div class="mb-3">
						<label for="nomor" class="form-label">Nomor Telepon/WA</label>
						<input type="text" class="form-control" name="nomor"  required placeholder="Masukkan Nomor Telepon/WA">
				</div>

				
</div>


					<!-- Status Pengajuan -->
					<div class="mb-3">
							<label for="status" class="form-label">Status Pengajuan</label>
							<select class="form-select" name="status" disabled>
									<option selected>Menunggu Verifikasi</option>
							</select>
					</div>

					<!-- Tombol Kirim Pengajuan -->
					<button type="submit" class="btn btn-primary">Kirim Permohonan</button>
			</form>
	</div>
</div>
</x-layout>
