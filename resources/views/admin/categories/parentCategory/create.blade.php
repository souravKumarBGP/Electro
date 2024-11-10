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
                        <span style="font-size: 23px; margin-right:5px;">Add new category</span>
                    </div><!-- /.col -->

                    <div class="col-sm-6" style="text-align: end;">
                        <a href="{{ route("admin.category") }}" class="btn btn-sm btn-primary px-4 rounded-0">Back</a>
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

                        <div class="card card-primary">

                            <!-- form start -->
                            <form class="col-7" action="{{ route("admin.storedCategory") }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="categoryName">Category Name:</label>
                                        <input type="text" name="categoryName" value="{{ old("categoryName") }}" id="categoryName" class="form-control @error('categoryName') is-invalid @enderror " />

                                        @error("categoryName")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="discreption" class="form-label">Category Discreption</label>
                                        <textarea name="discreption" class="form-control @error('discreption') is-invalid @enderror" id="discreption" rows="3"> {{ old("discreption") }} </textarea>

                                        @error("discreption")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="inputBox mt-4">
                                        <div class="input-group">
                                            <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                            <input type="file" name="picture" class="form-control ms-5  @error('picture') is-invalid @enderror" id="inputGroupFile01">
                                        </div>

                                        @error("picture")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                </div>
                                <!-- /.card-body -->

                            </form>
                        </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection {{-- End of main section --}}
