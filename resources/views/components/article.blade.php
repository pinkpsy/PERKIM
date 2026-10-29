<div class="col-lg-4">
    <article class="position-relative h-100">

      <div class="post-img position-relative overflow-hidden">
        <img src="{{ url('storage/' . $article->image) }}" class="img-fluid" alt="">
        <span class="post-date">{{ $article->published_at->format('d M Y') }}</span>
      </div>

      <div class="post-content d-flex flex-column">

        <h3 class="post-title">{{ Str::limit($article->title, 60, '...') }}</h3>

        <div class="meta d-flex align-items-center">
          <div class="d-flex align-items-center">
            <i class="bi bi-person"></i> <span class="ps-2">{{ $article->user->name }}</span>
          </div>
          <span class="px-3 text-black-50">/</span>
          <div class="d-flex align-items-center">
            <i class="bi bi-folder2"></i> <span class="ps-2">{{ $article->category->name }}</span>
          </div>
        </div>

        <p>
            {!! Str::limit($article->content, 100) !!}
        </p>

        <hr>

        <a href="/article/{{ $article->slug }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>

      </div>

    </article>
  </div>