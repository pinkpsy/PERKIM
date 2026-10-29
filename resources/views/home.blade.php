<x-layout>
    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
          <div
            id="hero-carousel"
            class="carousel slide carousel-fade"
            data-bs-ride="carousel"
            data-bs-interval="2000"
          >
            <div class="carousel-item active">
              <img src="assets/img/hero-carousel/slide01.jpg" alt="" />
              <div class="container">
              <p>
                  SELAMAT DATANG DI WEBSITE RESMI
              </p>
                <h2>DINAS PERKIM - HULU SUNGAI TENGAH</h2>
                <a href="#about" class="btn-get-started">Read More</a>
              </div>
            </div>
            <!-- End Carousel Item -->
  
            <div class="carousel-item">
              <img src="assets/img/hero-carousel/slide02.jpg" alt="" />
              <div class="container">
                  <p>
                      SELAMAT DATANG DI WEBSITE RESMI
                  </p>
                  <h2>DINAS PERKIM - HULU SUNGAI TENGAH</h2>
                <a href="#about" class="btn-get-started">Read More</a>
              </div>
            </div>
            <!-- End Carousel Item -->
  
            <a
              class="carousel-control-prev"
              href="#hero-carousel"
              role="button"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon bi bi-chevron-left"
                aria-hidden="true"
              ></span>
            </a>
  
            <a
              class="carousel-control-next"
              href="#hero-carousel"
              role="button"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon bi bi-chevron-right"
                aria-hidden="true"
              ></span>
            </a>
  
            <ol class="carousel-indicators"></ol>
          </div>
        </section>
        <!-- /Hero Section -->
  
        <!-- About Section -->
        <section id="about" class="about section">
          <div class="container">
            <div class="row position-relative">
              <div
                class="col-lg-7 about-img"
                data-aos="zoom-out"
                data-aos-delay="200"
              >
                <img src="assets/img/hero-carousel/slide01.jpg" />
              </div>
  
              <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                <h2 class="inner-title">Dinas Perkim - Hulu Sungai Tengah</h2>
                <div class="our-story">
                  <h4>Awal 2016</h4>
                  <h3>Tentang Kami</h3>
                  <p>
                    Dinas Perumahan Rakyat dan Kawasan Permukiman (PERKIM) dibentuk untuk mengelola dan mengembangkan sektor perumahan serta kawasan permukiman di Kabupaten Hulu Sungai Tengah. PERKIM telah beroperasi untuk memenuhi kebutuhan masyarakat akan tempat tinggal yang layak.
                  </p>
                  <p>
                    PERKIM terlibat dalam banyak program pembangunan, seperti rehabilitasi rumah tidak layak huni dan pengembangan infrastruktur permukiman. Dinas ini juga aktif dalam menangani kawasan kumuh dan berkolaborasi dengan berbagai pihak untuk mencapai tujuan pembangunan yang lebih luas.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- /About Section -->
  
        <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

      <div class="container">
        <div class="row gy-4">
          <div class="container section-title">
            <h2>Postingan Terbaru</h2>
          </div>
          
          @foreach ($latestArticles as $article)
            <x-article :$article />
          @endforeach

        </div>
      </div>

    </section><!-- /Blog Posts Section -->
      </main>
</x-layout>