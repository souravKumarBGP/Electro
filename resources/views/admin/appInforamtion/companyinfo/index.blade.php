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
                        <span style="font-size: 23px; margin-right:5px;">Company Information</span>
                    </div><!-- /.col -->

                    {{-- <div class="col-sm-6" style="text-align: end;">
                        <a href="#" class="btn btn-primary px-4 rounded-0">New Brand</a>
                    </div><!-- /.col --> --}}

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
                                                        <th class="sorting sorting_asc"> Company Id </th>
                                                        <th class="sorting sorting_asc"> Company Name </th>
                                                        <th class="sorting sorting_asc"> Customer Care No </th>
                                                        <th class="sorting sorting_asc"> Helpline No </th>
                                                        <th class="sorting sorting_asc"> Copy Right </th>
                                                        <th class="sorting sorting_asc"> App version </th>
                                                        <th class="sorting sorting_asc"> Company Logo </th>
                                                        <th class="sorting sorting_asc"> Action Button </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td style="width:150px;">{{ $data->id }}</td>
                                                        <td style="width: 150px;">{{ $data->companyName }}</td>
                                                        <td style="width: 400px;"> {{ $data->customerCareNo }} </td>
                                                        <td style="width: 400px;"> {{ $data->helpLineNo }} </td>
                                                        <td style="width: 400px;"> {{ $data->copyRight }} </td>
                                                        <td style="width: 400px;"> {{ $data->appVersion }} </td>
                                                        <td><img src="{{ asset("storage/".$data->companyLogo) }}" width="80" alt=""></td>
                                                        <td style="width: 130px; border:none;" class="d-flex justify-content-between">

                                                            <a onclick="return confirm('Are you sure edit this category')" href="{{ route("companyinfo.edit", $data->id) }}" class="mx-2">
                                                                <button class="btn btn-sm btn-outline-warning">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                    </svg>
                                                                    Edit
                                                                </button>
                                                            </a>

                                                        </td>
                                                    </tr>

                                                </tbody>

                                            </table>

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
