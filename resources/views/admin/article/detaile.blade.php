@extends('admin.master')
@section('title')
    admin - Detaile article
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Deatile article Page</h1>
        </div>
        <div class="row">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="200px">Title : </th>
                        <td>{{ $article->title }}</td>
                    </tr>
                    <tr>
                        <th>Category : </th>
                        <td>{{ $article->category_id }}</td>
                    </tr>
                    <tr>
                        <th>Description : </th>
                        <td>{!! $article->desc !!}</td>
                    </tr>
                    <tr>
                        <th>Image : </th>
                        <td>
                            <a href="{{ asset('storage/article/' . $article->img) }}">
                            <img src="{{ asset('storage/article/' . $article->img) }}" alt="" width="30%"
                                height="30%"></a>
                        </td>
                    </tr>
                    <tr>
                        <th>Views : </th>
                        <td>{{ $article->views }}</td>
                    </tr>
                    <tr>
                        <th>Status : </th>
                        <td>
                            @if ($article->status == 0)
                                <div class="badge bg-danger">Private</div>
                            @else
                                <div class="badge bg-success">Published</div>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Publish Date : </th>
                        <td>{{ $article->publish_date }}</td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-primary m-3 p-2" href="../article">Back</a>
        </div>
    </main>
@endsection
