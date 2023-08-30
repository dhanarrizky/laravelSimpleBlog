@extends('admin.master')
@section('title')
    admin - category
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">category Page</h1>
        </div>
        {{-- if have an error --}}
        @if ($errors->any())
            <div class="my-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>
                                {{ $err }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @if (session('success'))
            <div class="my-3">
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif


        <a type="button" href="#" class="btn btn-info m-2 mb-4 p-2" data-bs-toggle="modal"
            data-bs-target="#addCategory"><strong>Add New Category</strong></a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">slug</th>
                        <th scope="col">create at</th>
                        <th scope="col">update at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($categories)
                        @foreach ($categories as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a type="button" href="#" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editCategory{{ $item->id }}"><strong>Edit</strong></a>
                                    <a type="button" href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}"><strong>Delete</strong></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>

    @if ($categories)
        @include('admin.category.add_category')
        @include('admin.category.edit_category')
        @foreach ($categories as $item)
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="exampleModalLabel">confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete {{ $item->name }} caregory?
                        </div>
                        <div class="modal-footer">
                            <form action="{{ url('admin/category/' . $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Sure</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
