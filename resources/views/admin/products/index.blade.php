@extends('layoutes.admin.layout') {{-- Extends common admin layout from layout/admin folder --}}

@section('title')
    AdminLTE 3 | Product list
@endsection {{-- Pass dynamic page title --}}

{{-- *********************************** Start main section *********************************** --}}
@section('main')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">

                    <div class="col-sm-6" class="position-relative">
                        <span style="font-size: 23px; margin-right:5px;">All Categories</span>
                    </div><!-- /.col -->

                    <div class="col-sm-6" style="text-align: end;">
                        <a href="{{ route("products.create") }}" class="btn btn-primary px-4 rounded-0">New Product</a>
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
                                            <h6 class="card-ttle"><big>List of all products</big></h6>
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
                                        <div style="padding:10px; overflow-X:scroll;">
                                            <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"   style="width: 2000px;">
                                                <thead>
                                                    <tr>
                                                        <th class="sorting sorting_asc"> Product Id </th>
                                                        <th class="sorting sorting_asc"> Product Name </th>
                                                        <th class="sorting sorting_asc"> Brand Name </th>
                                                        <th class="sorting sorting_asc"> Parent Category Name </th>
                                                        <th class="sorting sorting_asc"> Child Category Name </th>
                                                        <th class="sorting sorting_asc"> Abalible Quan tity </th>
                                                        <th class="sorting sorting_asc"> Sell Price </th>
                                                        <th class="sorting sorting_asc"> Picture </th>
                                                        <th class="sorting sorting_asc"> Product Action Button </th>
                                                        <th class="sorting sorting_asc"> Gallary Action Button </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @if ($data == null)
                                                        <center class="mt-4 text-secondary"><h5>Data is not present</h5></center>
                                                    @else
                                                        @foreach ($data as $items)
                                                            <tr>
                                                                <td style="width:100px;">{{ $items->productId }}</td>
                                                                <td style="width: 150px;">{{ $items->productName }}</td>
                                                                <td> {{ $items->brandName }} </td>
                                                                <td> {{ $items->categoryName }} </td>
                                                                <td> {{ $items->childCategoryName }} </td>
                                                                <td> {{ $items->abalibleQuantity }} </td>
                                                                <td> {{ $items->sellPrice }} </td>

                                                                <td>
                                                                    <img src="{{ asset("storage/".$items->generalImage) }}" width="50" alt="">
                                                                </td>

                                                                <td class="pe-0" style="width: 250px;">

                                                                    <div class="d-flex justify-content-between">
                                                                        <a href="#">
                                                                            <button class="btn btn-sm btn-outline-primary">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                                                </svg>
                                                                                View
                                                                            </button>
                                                                        </a>

                                                                        <a onclick="return confirm('Are you sure edit this product')" href="{{ route("products.edit", $items->productId) }}" class="mx-2">
                                                                            <button class="btn btn-sm btn-outline-warning">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                                </svg>
                                                                                Edit
                                                                            </button>
                                                                        </a>

                                                                        <a href="#" onclick="return confirm('Are you sure you want to delete this product')">

                                                                            <form action="{{ route("products.destroy", $items->productId) }}" method="POST" class="border-none">

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
                                                                    </div>
                                                                </td>
                                                                <td style="width:330px;">

                                                                    <div class="d-flex justify-content-between">
                                                                        <a href="{{ route("gallary.index2", $items->productId) }}">
                                                                            <button class="btn btn-sm btn-outline-primary">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                                                </svg>
                                                                                View
                                                                            </button>
                                                                        </a>

                                                                        <a href="{{ route("gallary.show", $items->productId) }}">
                                                                            <button class="btn btn-sm btn-outline-primary">
                                                                                Create Gallary
                                                                            </button>
                                                                        </a>

                                                                        <a onclick="return confirm('Are you sure edit this product')" href="{{ route("gallary.edit", $items->productId) }}">
                                                                            <button class="btn btn-sm btn-outline-warning">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                                </svg>
                                                                                Edit gallary
                                                                            </button>
                                                                        </a>
                                                                    </div>

                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
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
