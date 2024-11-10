@extends('layoutes.admin.layout') {{-- Extends common admin layout from layout/admin folder --}}

@section('title')
    AdminLTE 3 | Category list
@endsection {{-- Pass dynamic page title --}}

{{-- *********************************** Start main section *********************************** --}}
@section('main')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">

                    <div class="col-sm-6" class="position-relative">
                        <span style="font-size: 23px; margin-right:5px;">All Brands</span>
                    </div><!-- /.col -->

                    <div class="col-sm-6" style="text-align: end;">
                        <a href="{{ route("admin.brands.create") }}" class="btn btn-primary px-4 rounded-0">New Brand</a>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content mt-1">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">

                            <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                                    <div class="row justify-content-between">
                                        <div class="card-eader">
                                            <h6 class="card-ttle"><big>List of all brands</big></h6>
                                        </div>
                                        <div>
                                            <div id="" class="d-flex">
                                                <input type="search" class="form-control form-control-sm" placeholder="Search by category name" size="30" />
                                            </div>
                                        </div>

                                        <div>
                                            <div class="dt-buttons btn-group flex-wrap">
                                                <button class="btn btn-sm btn-primary buttons-pdf buttons-html5" tabindex="0"
                                                    aria-controls="example1" type="button"><span>PDF</span>
                                                </button>
                                                <button class="btn btn-sm btn-primary buttons-print" tabindex="0"
                                                    aria-controls="example1" type="button"><span>Print</span>
                                                </button>
                                            </div>
                                        </div>

                                    </div> <!-- /.row -->

                                    <div class="row mt-3">
                                        <div>
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"   style="widt: 1500px;">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc"> Brand Id </th>
                                                        <th class="sorting sorting_asc"> Brand Name </th>
                                                        <th class="sorting sorting_asc"> Brand Discreption </th>
                                                        <th class="sorting sorting_asc"> Logo </th>
                                                        <th class="sorting sorting_asc"> Action Button </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if ($data == null)
                                                        <center class="mt-4 text-secondary"><h5>Data is not present</h5></center>
                                                    @else
                                                        @foreach ($data as $items)
                                                            <tr>
                                                                <td style="width:150px;">{{ $items->brandId }}</td>
                                                                <td style="width: 150px;">{{ $items->name }}</td>
                                                                <td style="width: 400px;"> {{ $items->metaDiscreption }} </td>
                                                                <td><img src="{{ asset("storage/".$items->logo) }}" width="50" alt=""></td>
                                                                <td style="width: 250px; border:none;" class="d-flex justify-content-between">

                                                                    <a href="#">
                                                                        <button class="btn btn-sm btn-outline-primary">Active</button>
                                                                    </a>

                                                                    <a onclick="return confirm('Are you sure edit this category')" href="{{ route("admin.brands.edit", $items->brandId) }}" class="mx-2">
                                                                        <button class="btn btn-sm btn-outline-warning">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                            </svg>
                                                                            Edit
                                                                        </button>
                                                                    </a>

                                                                    <a href="#" onclick="return confirm('Are you sure you want to delete this category')">

                                                                        <form action="{{ route("admin.brands.destroy", $items->brandId) }}" method="POST" class="border-none">

                                                                            @csrf
                                                                            @method("DELETE")

                                                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                                                </svg>
                                                                                Delete
                                                                            </button>
                                                                        </form>

                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                                <tfoot>
                                                    {{-- <tr>
                                                        <th class="sorting sorting_asc"> Category Id </th>
                                                        <th class="sorting sorting_asc"> Category Name </th>
                                                        <th class="sorting sorting_asc"> Category Discreption </th>
                                                        <th class="sorting sorting_asc"> Picture </th>
                                                        <th class="sorting sorting_asc"> Action Button </th>
                                                    </tr> --}}
                                                </tfoot>
                                            </table>


                                            {{-- Logic to create dynamic pagination using laravel methods --}}
                                            @if($data != null)
                                            {{ $data->links("pagination::bootstrap-5") }}
                                            @endif

                                        </div>
                                    </div> <!-- /.row -->

                                </div>

                            </div>

                        </div><!-- /.card -->

                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection {{-- End of main section --}}
