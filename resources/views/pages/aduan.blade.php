<x-layout>
	<div class="container mt-5 mb-5">
	<!-- Form Pengaduan Masyarakat -->
	<div class="container mt-5">
			<h2 class="text-center">Form Usulan Masyarakat - Bedah Rumah</h2>

			@if(session('success'))
					<div class="alert alert-success">{{ session('success') }}</div>
			@endif

			<form action="{{ route('aduan.store') }}" method="POST" enctype="multipart/form-data">
					@csrf

					<!-- Nama Pelapor -->
					<div class="mb-3">
							<label for="nama_pelapor" class="form-label">Nama Pelapor</label>
							<input type="text" class="form-control" name="nama_pelapor" required placeholder="Masukkan Nama Pelapor">
					</div>
					{{-- nik pelapor --}}
					<div class="mb-3">
						<label for="nik" class="form-label">NIK Pelapor</label>
						<input type="text" class="form-control" name="nik"  maxlength="16" required placeholder="Masukkan NIK Pelapor">
				</div>

					<!-- KTP Pelapor -->
					<div class="mb-3">
							<label for="ktp_pelapor" class="form-label">KTP Pelapor</label>
							<input type="file" class="form-control" name="ktp_pelapor" accept=".jpg, .png, .jpeg, .pdf" required >
					</div>

					<!-- Alamat Rumah -->
					<div class="mb-3">
							<label for="alamat_rumah" class="form-label">Alamat Rumah</label>
							<input type="text" class="form-control" name="alamat_rumah" required placeholder="Masukkan Alamat Rumah">
					</div>

					<!-- KTP Pemilik Rumah -->
					<div class="mb-3">
							<label for="ktp_pemilik" class="form-label">KTP Pemilik Rumah</label>
							<input type="file" class="form-control" name="ktp_pemilik" accept=".jpg, .png, .jpeg, .pdf" required>
					</div>

					<!-- Foto Rumah -->
					<div class="mb-3">
							<label for="foto_rumah" class="form-label">Foto Rumah (4 sisi)</label>
							<input type="file" class="form-control" name="foto_rumah[]" accept=".jpg, .png, .jpeg, .pdf" multiple required>
					</div>

					<!-- Kriteria Rumah -->
<div class="mb-3">
	<label class="form-label">Kriteria Rumah</label><br>

	<!-- Kriteria Atap -->
	<fieldset class="mb-3">
			<label class="form-label">Atap :</label>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_atap[]" value="daun">
					<label class="form-check-label"> Daun</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_atap[]" value="seng">
					<label class="form-check-label"> Seng</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_atap[]" value="genteng">
					<label class="form-check-label"> Genteng</label>
			</div>
	</fieldset>

	<!-- Kriteria Dinding -->
	<fieldset class="mb-3">
		<label class="form-label">Dinding :</label>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_dinding[]" value="beton">
					<label class="form-check-label"> Beton</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_dinding[]" value="bata">
					<label class="form-check-label"> Bata</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_dinding[]" value="kayu">
					<label class="form-check-label"> Kayu</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_dinding[]" value="seng">
					<label class="form-check-label"> Seng</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_dinding[]" value="calci_board">
					<label class="form-check-label"> Kalsiboard</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_dinding[]" value="anyaman_bambu">
					<label class="form-check-label"> Anyaman Bambu</label>
			</div>
	</fieldset>

	<!-- Kriteria Lantai -->
	<fieldset class="mb-3">
		<label class="form-label">Lantai :</label>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_lantai[]" value="kayu">
					<label class="form-check-label"> Kayu</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_lantai[]" value="keramik">
					<label class="form-check-label"> Keramik</label>
			</div>
			<div class="form-check">
					<input class="form-check-input" type="radio" name="kriteria_lantai[]" value="cor">
					<label class="form-check-label"> Cor</label>
			</div>
	</fieldset>
</div>


					<!-- Status Pengaduan -->
					<div class="mb-3">
							<label for="status" class="form-label">Status Pengaduan</label>
							<select class="form-select" name="status" disabled>
									<option selected>Menunggu Verifikasi</option>
							</select>
					</div>

					<!-- Tombol Kirim Pengaduan -->
					<button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
			</form>
	</div>
</div>
</x-layout>
