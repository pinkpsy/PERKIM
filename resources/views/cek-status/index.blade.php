<x-layout>
    <div class="d-flex flex-column justify-content-center align-items-center" style="min-height: calc(100vh - 100px);">
      <div class="container" style="max-width: 400px;">
        <h3 class="mb-4 text-center">Cek Status Laporan Anda</h3>
        <form method="POST" action="{{ route('cek-status.check') }}">
            @csrf
            <div class="mb-3">
                <label for="nik" class="form-label">Masukkan NIK Anda</label>
                <input type="text" name="nik" id="nik" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cek Status</button>
        </form>
      </div>
    </div>
  </x-layout>
  