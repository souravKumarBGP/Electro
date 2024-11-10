@extends('layoutes.admin.layout') {{-- Extends common admin layout from layout/admin folder --}}

@section('title') {{-- Pass dynamic page title --}}
    AdminLTE 3 | Product Gallary Image
@endsection

{{-- Add dynamially css file in head tag --}}
@push("head")
    <link rel="stylesheet" href="{{ asset("./assets/vendor/ritchTextEditor/rte_theme_default.css") }}" />
@endpush

{{-- *********************************** Start main section *********************************** --}}
@section('main')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">

                    <div class="col-sm-6" class="position-relative">
                        <span style="font-size: 23px; margin-right:5px;">Create New Products</span>
                    </div><!-- /.col -->

                    <div class="col-sm-6" style="text-align: end;">
                        <a href="{{ route("products.index") }}" class="btn btn-sm btn-primary px-4 rounded-0">Back</a>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">
                    <div class="col-12">

                        {{-- Dynamicly error --}}
                        @session('message')
                            {{ session("message") }}
                        @endsession

                        <div class="card card-primary">

                            <!-- form start -->
                            <form class="col-12" action="{{ route("gallary.store") }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="row">

                                    <div class="card-body col-6">

                                        <div class="row">

                                            <div class="col-12 mb-3">

                                                <label for="unit" class="mb-1">Product id:</label>
                                                <input type="number" name="productId" readonly value="{{ $data->productId }}" class="form-control ms-5  @error('productId') is-invalid @enderror" id="productId" />

                                                @error("productId")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">

                                                <label for="unit" class="mb-1">Product name:</label>
                                                <input type="text" name="productName" disabled value="{{ $data->productName }}" class="form-control ms-5  @error('productName') is-invalid @enderror" id="productName" />

                                                @error("productName")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="inputBox mt-1">

                                            <label for="productName" class="mb-1">Gallary Image:</label>
                                            <div class="input-group">
                                                <label class="input-group-text" for="gallaryImg">Upload</label>
                                                <input type="file" name="gallaryImg[]" multiple class="form-control ms-5  @error('gallaryImg') is-invalid @enderror" id="gallaryImg" />
                                            </div>

                                            @error("gallaryImg")
                                                <p class="text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-5">Insert Gallary</button>

                                    </div><!-- ./col-6 -->

                                </div>

                            </form>
                        </div><!-- /.card-body -->

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection {{-- End of main section --}}



