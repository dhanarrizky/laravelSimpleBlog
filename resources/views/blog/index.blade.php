@extends('blog.master')
@section('title')
    blog
@endsection
@push('css')
    <style>
        .wrapper {
            max-height: 260px;
            display: flex;
            overflow-x: scroll;
        }

        .wrapper::-webkit-scrollbar {
            width: 0%;
        }

        .wrapper .item {
            min-width: 110px;

        }

        img {
            max-height: 500px;
            max-width: 800px;
        }
    </style>
@endpush
@section('content')
    <main class="container">
        {{-- <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">the future is in your hands</h1>
                <p class="lead my-3">reading is a source of insight, and we are the right choice <br>
                    read as much as you can on our blog page</p>
                <p class="lead mb-0"><a href="#" class="text-white fw-bold">go ahead and read your dream arcicle</a></p>
            </div>
        </div> --}}
        @if ($latest_post)
            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic">{{ $latest_post->title }}</h1>
                    <p class="lead my-3">{!! Str::limit($latest_post->desc, 500) !!}
                    <p class="lead mb-0"><a href="#" class="text-white fw-bold">go ahead and read your dream arcicle</a>
                    </p>
                </div>
            </div>
        @endif

        @if ($article)
            <div class="row-20 wrapper">
                @foreach ($article as $item)
                    <div class="col-md-6 ml-4 item">
                        <div class="row g-0 border rounded flex-md-col mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary">World</strong>
                                <h3 class="mb-0">{{ $item->title }}</h3>
                                <div class="mb-1 text-muted">{{ $item->publish_date }}</div>
                                <p class="card-text mb-auto">{!! Str::limit($item->desc, 100) !!}</p>
                                <a href="#" class="stretched-link">{{ $item->category->name }}</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                {{-- <svg class="bd-placeholder-img" width="200" height="250"
                                    src="{{ asset('storage/article/'.$item->img) }}" role="img" aria-label="Placeholder: Thumbnail"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%"
                                        fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg> --}}
                                <img src="{{ asset('storage/article/' . $item->img) }}" alt="Thumbnail"
                                    class="bd-placeholder-img" width="200" height="250">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Article
                </h3>
                @if ($article)
                    @foreach ($article as $item)
                        <article class="blog-post">
                            <h2 class="blog-post-title">{{ $item->title }}</h2>
                            <p class="blog-post-meta">{{ $item->publish_date }}<a href="#"
                                    class="m-3">{{ $item->category->name }}</a></p>

                            <img src="{{ asset('storage/article/' . $item->img) }}" alt="{{ $item->title }} image">
                            <hr>
                            <p>{!! $item->desc !!}</p>
                            {{-- <nav class="blog-pagination" aria-label="Pagination">
                            <a class="btn btn-outline-primary" href="#">Older</a>
                            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1"
                                aria-disabled="true">Newer</a> --}}
                            </nav>
                        </article><br>
                    @endforeach
                @endif
            </div>

            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="fst-italic">quotes</h4>
                        <p class="mb-0">experience is the best teacher, <br>and by reading we can find out other people's
                            experiences to be used as lessons</p>
                    </div>

                    <div class="p-4">
                        <h4 class="fst-italic">Archives</h4>
                        <ol class="list-unstyled mb-0">
                            @if ($categories)
                                @foreach ($categories as $item)
                                    <li><a href="{{ url('category/' . $item->id) }}">{{ $item->name }}</a></li>
                                @endforeach
                            @endif
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <div class="pagination justify-content-center my-4">
        {{ $article->links() }}
    </div>
@endsection
