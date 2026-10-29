<x-layout>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Dokumen</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="#">Home</a></li>
                <li class="current">Dokumen</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->
    
        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">
          <div class="col-lg-12">
            <div class="container table-container" style="overflow: auto;">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 5%; text-align: center;">No</th>
                            <th style="width: 88%;">Nama Dokumen</th>
                            <th style="width: 88%;">Jenis Dokumen</th>
                            <th style="width: 7%;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                <td style="text-align: center;">{{ $loop->iteration }}</td>
                                <td>{{ $document->name }}</td>
                                <td>{{ $document->jenis }}</td>
                                <td><a type="button" class="btn btn-warning"
                                        href="{{ url('storage/' . $document->file) }}">Download</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <!--/ Accordion end -->
            <div class="gap-40 "></div>
            <div class="d-flex justify-content-center">
                {{ $documents->links() }}
            </div>
        </div>
        </section><!-- /Starter Section Section -->
    
      </main>
</x-layout>