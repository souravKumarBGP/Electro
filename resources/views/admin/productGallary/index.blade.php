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
                        <span style="font-size: 23px; margin-right:5px;">Products gallary images</span>
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

                        <div class="card card-primary p-3">


                            <div class="row justify-content-between">

                                @foreach ($data as $items)
                                    <div class="col-2">
                                        <img style="width: 100%;" style="max-height: 200px;" class="img-fluid" src="{{ asset("/storage/".$items->gallaryImg) }}" alt="">
                                    </div>
                                @endforeach
                            </div>


                        </div><!-- /.card-body -->

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection {{-- End of main section --}}



