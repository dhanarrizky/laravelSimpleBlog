@extends('admin.master')
@section('title')
    admin - profile
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profile</h1>
        </div>
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
        <div class="container">
            <a href="#" data-bs-toggle="modal" data-bs-target="#addUser" class="btn btn-success">Register New Users</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">email</th>
                        <th scope="col">created at</th>
                        <th scope="col"> action </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($profile)
                        @foreach ($profile as $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#editUser{{ $item->id }}"
                                        class="btn btn-warning">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $item->id }}"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>
    @include('admin.users.addUser')
    @include('admin.users.editUser')
    @include('admin.users.deleteUser')
@endsection
