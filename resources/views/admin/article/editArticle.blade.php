@extends('admin.master')

<!--digunakkan untuk menggunakkan stack pada head kita harus menggunakkan push-->
@push('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('title')
    admin - add new article
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">new Article Page</h1>
        </div>

        <div class="mt-3">
            @if ($errors->any())
                <div class="my-3">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif


            <form action="{{ url('admin/article/'.$article->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="oldImg" value="{{ $article->img }}">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title',$article->title) }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="category_id">Category</label>
                            <select type="text" name="category_id" id="category_id" class="form-control"
                                value="{{ old('category_id') }}">
                                <option value="{{ old('Category_id',$article->Category->id) }}" hidden>{{ old('Category_id',$article->Category->name) }}</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Description</label>
                        <textarea type="text" name="desc" id="desc" class="form-control" value="{{ old('desc') }}" style="height: 50px;">{{ $article->desc }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="img">Image (max 2 Mb)</label>
                            <input type="file" name="img" id="img" class="form-control"
                                value="{{ old('img') }}"onchange="loadFile(event)">
                                image priview : <img class="m-2" id="output" height="100px" width="100px">
                                old image : 
                                <img src="{{ asset('storage/article/'.old('img',$article->img)) }}" class="m-2" alt="" width="100px" height="100px">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="status">status</label>
                            <select type="text" name="status" id="status" class="form-control">
                            <option value="0" {{ $article->status == 0 ? 'selected' : null }} >Private</option>
                            <option value="1" {{ $article->status == 1 ? 'selected' : null }} >Publish</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="publish_date">Publish Date</label>
                            <input type="date" name="publish_date" id="pubish_date" class="form-control"
                            value="{{ old('publish_date',$article->publish_date) }}">
                        </div>
                    </div >
                    <a class="btn btn-primary mr-2 mb-4 mt-2 p-2" href="{{ url('admin/article') }}">cancle</a>
                    <button class="btn btn-success mr-2 p-2 mb-3" type="submit">Save</button>
                </div>
            </form>
        </div>
    </main>
    <script>
        // privew image
        var loadFile = function(event){
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    @push('js')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '../../laravel-filemanager?type=Images',
            filebrowserImageUploadUrl:'../../laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '../../laravel-filemanager?type=Files',
            filebrowserUploadUrl:'../../laravel-filemanager/upload?type=Files&_token=',
            clipboard_handleImages:false
        }
    </script>
    <script>
       CKEDITOR.replace('desc', options);
    </script>
    @endpush
@endsection
