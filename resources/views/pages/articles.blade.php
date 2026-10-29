 <x-layout>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Berita & Pengumuman</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="#">Home</a></li>
                <li class="current">Berita & Pengumuman</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->
    
        <!-- Starter Section Section -->
        <section id="starter-section" class="starter-section section">
                <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
          <div class="row gy-4">
  
            @foreach ($articles as $article)
              <x-mainarticle :article="$article" />
            @endforeach
  
          </div>
        </div>
  
      </section><!-- /Blog Posts Section -->

          <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

        <div class="container">
          {{ $articles->links() }}
        </div>
  
      </section><!-- /Blog Pagination Section -->
          <!-- End Section Title -->
        </section><!-- /Starter Section Section -->
      </main>
</x-layout>