<x-layouts>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Data Pegawai</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="#">Profil</a></li>
                <li class="current">Data Pegawai</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->
    
        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">
            <div class="container mt-4">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab">
                            Profil Kepala Dinas
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab">
                            ASN
                        </button>
                    </li>
                </ul>
            
                <!-- Tab Content -->
                <div class="tab-content" id="profileTabsContent">
                    <!-- Tab Profil Detail -->
                    <div class="tab-pane fade show active" id="detail" role="tabpanel">
                        <div class="profile-section">
                            {{-- <h1 class="main-title">PROFIL PEJABAT STRUKTURAL & FUNGSIONAL</h1> --}}
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ Storage::url($profile->photo) }}" alt="Foto Profil" class="profile-image">
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <div class="info-label">Nama</div>
                                        <div>{{ $profile->name }}</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="info-label">Jabatan</div>
                                        <div>{{ $profile->position }}</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="info-label">Tempat & Tanggal Lahir</div>
                                        <div>{{ $profile->birth_place }}, {{ $profile->birth_date->format('d/m/Y') }}</div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="info-label">Alamat Kantor</div>
                                        <div>{{ $profile->office_address }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row career-section">
                                <div class="col-md-6">
                                    <div class="career-title">Riwayat Jabatan Struktural</div>
                                    @foreach($profile->structuralPositions as $position)
                                        <div class="career-item">
                                            <strong>TMT: {{ $position->period }}</strong><br>
                                            {{ $position->position_name }}<br>
                                            @if($position->skpd)
                                            <small>SKPD: {{ $position->skpd }}</small>
                                            @endif
                                        </div>
                                    @endforeach
                                    <!-- Tambahkan riwayat jabatan lainnya -->
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="career-title">Riwayat Pendidikan Formal</div>
                                        @foreach($profile->formalEducations as $education)
                                        <div class="career-item">
                                            <strong>{{ $education->degree }}</strong>
                                            <br>
                                            {{ $education->institution }}
                                            <br>
                                            <small>{{ $education->tmt }}</small>
                                        </div>
                                        @endforeach
                                </div>
            
                                <div class="col-md-3">
                                    <div class="career-title">Riwayat Pendidikan Non Formal</div>
                                        @foreach($profile->nonFormalEducations as $education)
                                        <div class="career-item">
                                            <strong>{{ $education->name }}</strong><br>
                                            TMT {{ $education->tmt }}
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <!-- Tab Daftar Pejabat -->
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        <div class="table-container">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">NO</th>
                                            <th width="35%">JABATAN</th>
                                            <th width="25%">NAMA</th>
                                            <th width="15%">GOLONGAN</th>
                                            <th width="10%">FOTO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pejabat as $item )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="department">{{ $item->bidang }}</span><br>
                                                <span class="position">{{ $item->jabatan }}</span>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->golongan }}</td>
                                            <td><img src="{{ url('storage/' . $item->image) }}" alt="Foto Profil" class="table-profile-image  zoomable-image" style="cursor: zoom-in;"></td>
                                        </tr>
                                        @endforeach
                                        <!-- Tambahkan baris lainnya -->
                                    </tbody>
                                   
                                </table>
                            </div>
                            <div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                      <img id="zoomedImage" src="{{ url('storage/' . $item->image) }}" class="img-fluid" alt="Zoom Foto">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                  const images = document.querySelectorAll('.zoomable-image');
                                  const zoomedImage = document.getElementById('zoomedImage');
                              
                                  images.forEach(img => {
                                    img.addEventListener('click', function () {
                                      zoomedImage.src = this.src;
                                      const zoomModal = new bootstrap.Modal(document.getElementById('zoomModal'));
                                      zoomModal.show();
                                    });
                                  });
                                });
                              </script>
                              
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Starter Section Section -->
      </main>
</x-layouts>