@extends('admin.master')

<!--digunakkan untuk menggunakkan stack pada head kita harus menggunakkan push-->
@push('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('title')
    admin - article
@endsection

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Article Page</h1>
        </div>

        <div class="swal" data-swal="{{ session('success') }}"></div>

        <a type="button" href="{{ url('admin/article/create') }}" class="btn btn-info m-2 mb-4 p-2"><strong>Add New
                Article</strong></a>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Views</th>
                        <th scope="col">Status</th>
                        <th scope="col">publish_date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </main>



    @push('js')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- alert success --}}
        <script>
            const swal = $('.swal').data('swal');
            if (swal) {
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'success',
                    text: swal,
                    showConfirmButton: false,
                    timer: 2000
                })
            }

            function deleteArticle(e) {
                Swal.fire({
                    icon: 'question',
                    title: 'Delete',
                    text: 'Are you Sure ?',
                    showCancelButton: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'DELETE',
                            url: '../admin/article/' + e,
                            dataType: "json",
                            success: function(response) {
                                Swal.fire({
                                    title: 'success',
                                    text: response.message,
                                    icon: 'success',
                                }).then((result) => {
                                    window.location.href = '../admin/article';
                                })
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                            }
                        });
                    }
                })
            }
        </script>
        {{-- datatable --}}
        <script>
            new DataTable('#dataTable', {
                processing: true,
                serverside: true,
                ajax: '{{ url()->current() }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'views',
                        name: 'views'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'publish_date',
                        name: 'publish_date'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                ]
            });
        </script>
    @endpush
@endsection
