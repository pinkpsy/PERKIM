<x-layout>
    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Blog Details</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Blog Details</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->
    
        <div class="container">
          <div class="row">
    
            <div class="col-lg-8">
    
              <!-- Blog Details Section -->
              <section id="blog-details" class="blog-details section">
                <div class="container">
    
                  <article class="article">
    
                    <div class="post-img">
                      <img src="{{ url('storage/' . $article->image) }}" alt="" class="img-fluid">
                    </div>
    
                    <h2 class="title">{{ $article->title }}</h2>
    
                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>{{ $article->user->name }}</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time>{{ $article->published_at->format('d M Y') }}</time></a></li>
                      </ul>
                    </div><!-- End meta top -->
    
                    <div class="content">
                      {!! nl2br(e($article->content)) !!}
                  </div>
    
                    <div class="meta-bottom">
                      <i class="bi bi-folder"></i>
                      <ul class="cats">
                        <li><a href="#">{{ $article->category->name }}</a></li>
                      </ul>
                    </div><!-- End meta bottom -->
    
                  </article>
    
                </div>
              </section><!-- /Blog Details Section -->
    
            </div>
    
            <div class="col-lg-4 sidebar">
    
              <div class="widgets-container">
    
                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">
    
                  <h3 class="widget-title">Artikel Terbaru</h3>
    
                    @foreach ($newArticles as $nArticle)
                        <x-recentarticle :article="$nArticle" />
                    @endforeach
                  <!-- End recent post item-->
    
                </div><!--/Recent Posts Widget -->
    
              </div>
    
            </div>
    
          </div>
        </div>
    
      </main>
</x-layout>