@extends('layoutes.admin.layout') {{-- Extends common admin layout from layout/admin folder --}}

@section('title')
    AdminLTE 3 | Brands list
@endsection {{-- Pass dynamic page title --}}

{{-- *********************************** Start main section *********************************** --}}
@section('main')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">

                    <div class="col-sm-6" class="position-relative">
                        <span style="font-size: 23px; margin-right:5px;">Edit company infor</span>
                    </div><!-- /.col -->

                    <div class="col-sm-6" style="text-align: end;">
                        <a href="{{ route("companyinfo.index") }}" class="btn btn-sm btn-primary px-4 rounded-0">Back</a>
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
                            <form class="col-7" action="{{ route("companyinfo.update", $data->id) }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                @method("PUT")

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="companyName">Company Name:</label>
                                        <input type="text" name="companyName" value="{{ $data->companyName }}" id="companyName" class="form-control @error('companyName') is-invalid @enderror " />

                                        @error("companyName")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="inputBox mt-4">
                                        <div class="input-group">
                                            <label class="input-group-text" for="companyLogo">Company Logo</label>
                                            <input type="file" name="companyLogo" class="form-control ms-5  @error('companyLogo') is-invalid @enderror" id="inputGroupFile01">
                                        </div>

                                        @error("companyLogo")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="customerCareNo">Customer Care Number:</label>
                                        <input type="string" name="customerCareNo" value="{{ $data->customerCareNo }}" id="customerCareNo" class="form-control @error('customerCareNo') is-invalid @enderror " />

                                        @error("customerCareNo")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="helpLineNo">Help Line Number:</label>
                                        <input type="string" name="helpLineNo" value="{{ $data->helpLineNo }}" id="helpLineNo" class="form-control @error('helpLineNo') is-invalid @enderror " />

                                        @error("helpLineNo")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="copyRight">Copy Right:</label>
                                        <input type="string" name="copyRight" value="{{ $data->copyRight }}" id="copyRight" class="form-control @error('copyRight') is-invalid @enderror " />

                                        @error("copyRight")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="appVersion">App version:</label>
                                        <input type="string" name="appVersion" value="{{ $data->appVersion }}" id="appVersion" class="form-control @error('appVersion') is-invalid @enderror " />

                                        @error("appVersion")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="facebookLinks">Facebook Links:</label>
                                        <input type="string" name="facebookLinks" value="{{ $data->facebookLinks }}" id="facebookLinks" class="form-control @error('facebookLinks') is-invalid @enderror " />

                                        @error("facebookLinks")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="linkedinLinks">Linkedin Links:</label>
                                        <input type="string" name="linkedinLinks" value="{{ $data->linkedinLinks }}" id="linkedinLinks" class="form-control @error('linkedinLinks') is-invalid @enderror " />

                                        @error("linkedinLinks")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="tutreLinks">Tuture Links:</label>
                                        <input type="string" name="tutreLinks" value="{{ $data->tutreLinks }}" id="tutreLinks" class="form-control @error('tutreLinks') is-invalid @enderror " />

                                        @error("tutreLinks")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="whatsaapLinks">Whatsaap Links:</label>
                                        <input type="string" name="whatsaapLinks" value="{{ $data->whatsaapLinks }}" id="whatsaapLinks" class="form-control @error('whatsaapLinks') is-invalid @enderror " />

                                        @error("whatsaapLinks")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="companyAddress">Company Address:</label>
                                        <input type="string" name="companyAddress" value="{{ $data->companyAddress }}" id="companyAddress" class="form-control @error('companyAddress') is-invalid @enderror " />

                                        @error("companyAddress")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="companyEmail">Company Address:</label>
                                        <input type="email" name="companyEmail" value="{{ $data->companyEmail }}" id="companyEmail" class="form-control @error('companyEmail') is-invalid @enderror " />

                                        @error("companyEmail")
                                            <p class="text-danger"><small>{{ $message }}</small></p>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">Update Now</button>

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
