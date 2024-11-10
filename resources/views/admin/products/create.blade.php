@extends('layoutes.admin.layout') {{-- Extends common admin layout from layout/admin folder --}}

@section('title') {{-- Pass dynamic page title --}}
    AdminLTE 3 | Brands list
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
                            <form class="col-12" action="{{ route("products.store") }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="row">

                                    <div class="card-body col-6">

                                        <div class="row">

                                            <div class="col mb-3">

                                                <div class="form-group">
                                                    <label for="productName">Product Name:</label>
                                                    <input type="text" name="productName" value="{{ old("productName", "Intex") }}" id="productName" class="form-control @error('productName') is-invalid @enderror " />

                                                    @error("productName")
                                                        <p class="text-danger"><small>{{ $message }}</small></p>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="col mb-3">

                                                <label for="brandName" class="mb-1">Brand:</label>
                                                <select class="custom-select" name="brandName" id="brandName">

                                                    @foreach ($brandName as $items)
                                                        <option value="{{ $items->name }}">{{ $items->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error("brandName")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col mb-3">

                                                <label for="mrp" class="mb-1">MRP(Rs):</label>
                                                <input type="text" name="mrp" value="{{ old("mrp", 3000) }}" id="mrp" class="form-control @error('mrp') is-invalid @enderror " />

                                                @error("mrp")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">

                                                <label for="sellPrice" class="mb-1">Sell Price(Rs):</label>
                                                <input type="number" name="sellPrice" value="{{ old("sellPrice", 203) }}" id="sellPrice" class="form-control @error('sellPrice') is-invalid @enderror " />

                                                @error("sellPrice")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col mb-3">

                                                <label for="categoryName" class="mb-1">Parent Category:</label>
                                                <select class="custom-select" name="categoryName" id="categoryName">
                                                    @foreach ($categoryName as $items)
                                                        <option>{{ $items->categoryName }}</option>
                                                    @endforeach
                                                </select>

                                                @error("categoryName")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                            <div class="col mb-3">

                                                <label for="childCategoryName" class="mb-1">Child category:</label>
                                                <select class="custom-select" name="childCategoryName" id="childCategoryName">

                                                    @foreach ($childCategoryName as $items)
                                                        <option value="{{ $items->childCategoryName }}">{{ $items->childCategoryName }}</option>
                                                    @endforeach
                                                </select>

                                                @error("childCategoryName")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col mb-3">

                                                <label for="unite" class="mb-1">Unites:</label>
                                                <select class="custom-select" name="unite" id="unite">
                                                    <option value="Pice">Pice</option>
                                                    <option value="kg">KG</option>
                                                    <option value="feet">Feet</option>
                                                </select>

                                                @error("unite")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror

                                            </div>

                                            <div class="col mb-3">

                                                <label for="unit" class="mb-1">Total Quantity:</label>
                                                <input type="number" name="totalQuantity" value="{{ old("totalQuantity",3) }}" class="form-control ms-5  @error('totalQuantity') is-invalid @enderror" id="totalQuantity" />

                                                @error("totalQuantity")
                                                    <p class="text-danger"><small>{{ $message }}</small></p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="inputBox mt-1">

                                            <label for="productName" class="mb-1">Thumbnail Image:</label>
                                            <div class="input-group">
                                                <label class="input-group-text" for="thumbnailImage">Upload</label>
                                                <input type="file" name="thumbnailImage" class="form-control ms-5  @error('thumbnailImage') is-invalid @enderror" id="thumbnailImage" />
                                            </div>

                                            @error("thumbnailImage")
                                                <p class="text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <div class="inputBox mt-4">

                                            <label for="productName" class="mb-1">General Image:</label>
                                            <div class="input-group">
                                                <label class="input-group-text" for="generalImage">Upload</label>
                                                <input type="file" name="generalImage" class="form-control ms-5  @error('generalImage') is-invalid @enderror" id="generalImage" />
                                            </div>

                                            @error("generalImage")
                                                <p class="text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-5">Create Product</button>

                                    </div><!-- ./col-6 -->

                                    <div class="col-6 mt-4">

                                        <div class="mb-3">
                                            <label for="productDiscreption" class="form-label">Product Discreption</label>
                                            <textarea  style="width: 100%" name="productDiscreption" class="form-control @error('productDiscreption') is-invalid @enderror" id="productDiscreption" rows="3">  </textarea>

                                            @error("productDiscreption")
                                                <p class="text-danger"><small>{{ $message }}</small></p>
                                            @enderror
                                        </div>
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

{{-- Add dynamically js file --}}
@push("script")
    <script type="text/javascript" src="{{ asset("assets/vendor/ritchTextEditor/rte.js") }}"></script>
    <script type="text/javascript" src='{{ asset("assets/vendor/ritchTextEditor/all_plugins.js") }}'></script>

    <script>
        var editor1cfg = {}
        editor1cfg.toolbar = "basic";
        var editor1 = new RichTextEditor("#productDiscreption", editor1cfg);
    </script>

@endpush


