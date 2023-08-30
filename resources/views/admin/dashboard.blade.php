@extends('admin.master')
@section('title')
    admin
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">
                        <h3>Article</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">the total number of articles</h5>
                        <p class="card-text">
                        <h4><b>{{ $total_articles }} Articles</b></h4>
                        </p>
                        <h6><a href="{{ url('admin/article') }}" class="btn btn-warning"><b>View</b></a></h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header">
                                <h5>Article Publish</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">the total number of articles that have been published</h6>
                                <p class="card-text">
                                <h4><b>{{ $article_publish }}</b></h4>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-header">
                                <h5>Article Private</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">the total number of articles that have not been published</h6>
                                <p class="card-text">
                                <h4><b>{{ $article_private }}</b></h4>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <h3>Articles table</h3>
                <table class="table table-primary table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Detaile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($article_table as $art)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $art->title }}
                                </td>
                                <td>
                                    {{ $art->category->name }}
                                </td>
                                <td>
                                    <a href="{{ url('admin/article/' . $art->id) }}"
                                        class="btn btn-warning"><b>Detaile</b></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col">
                <div class="card text-dark bg-warning mb-3">
                    <div class="card-header">
                        <h3>Categories</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">the total number of Categories</h5>
                        <p class="card-text">
                        <h4><b>{{ $total_categories }} Categories</b></h4>
                        </p>
                        @if (auth()->user()->role == 1)
                        <h6><a href="{{ url('admin/category') }}" class="btn btn-primary"><b>View</b></a></h6>
                        @endif
                    </div>
                </div>
                <h3>categories table</h3>
                <table class="table table-warning table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category_table as $cat)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $cat->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3>Popular Article table</h3>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($popular_article as $pop)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $pop->title }}
                                </td>
                                <td>
                                    {{ $pop->views }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
