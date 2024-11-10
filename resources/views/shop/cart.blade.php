@extends("layoutes.app") {{-- Extends common layoute from layoutes folder --}}

@section("title") Cart | Electro - Responsive Website Template @endsection {{-- Pass dynamicaly page title --}}

{{-- *********************************** Start main section *********************************** --}}
@section("main")
<main id="content" role="main" class="cart-page">

    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">

            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4">
            <h1 class="text-center">Cart</h1>
        </div>

        @if(Auth::check())

            <div class="mb-10 cart-table">
                {{-- <form class="mb-4" action="#" method="post"> --}}
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity w-lg-15">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $items)
                                <tr class="">
                                    <td class="text-center">
                                        {{-- <a href="#" class="text-gray-32 font-size-26">×</a> --}}

                                        <form action="{{ route("cart.destroy", $items->productId) }}" method="POST">

                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="text-gray-32 font-size-26 bg-transparent border-0">×</button>
                                        </form>

                                    </td>
                                    <td class="d-none d-md-table-cell">
                                        <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{ asset("/storage/".$items->productThemainal) }}" alt="Image Description"></a>
                                    </td>

                                    <td data-title="Product">
                                        <a href="#" class="text-gray-90">{{ $items->productName }}</a>
                                    </td>

                                    <td data-title="Price">
                                        <span class="">${{ $items->sellPrice }}</span>
                                    </td>

                                    <td data-title="Quantity">
                                        <span class="sr-only">Quantity</span>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col">
                                                    <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1">
                                                </div>
                                                <div class="col-auto pr-1">
                                                    <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </a>
                                                    <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </td>

                                    <td data-title="Total">
                                        <span class="">$1,100.00</span>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="6" class="border-top space-top-2 justify-content-center">
                                    <div class="pt-md-3">
                                        <div class="d-block d-md-flex flex-center-between">
                                            <div class="mb-3 mb-md-0 w-xl-40">
                                                <!-- Apply coupon Form -->
                                                <form class="js-focus-state">
                                                    <label class="sr-only" for="subscribeSrEmailExample1">Coupon code</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="text" id="subscribeSrEmailExample1" placeholder="Coupon code" aria-label="Coupon code" aria-describedby="subscribeButtonExample2" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-block btn-dark px-4" type="button" id="subscribeButtonExample2"><i class="fas fa-tags d-md-none"></i><span class="d-none d-md-inline">Apply coupon</span></button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- End Apply coupon Form -->
                                            </div>
                                            <div class="d-md-flex">
                                                <button type="button" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Update cart</button>
                                                <a href="../shop/checkout.html" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Proceed to checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                {{-- </form> --}}
            </div>
            <div class="mb-8 cart-total">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                        <div class="border-bottom border-color-1 mb-3">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Cart totals</h3>
                        </div>
                        <table class="table mb-3 mb-md-0">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal"><span class="amount">${{ $subTotal }}</span></td>
                                </tr>
                                <tr class="shipping">
                                    <th>GST </th>
                                    <td>{{ $gst }}%</td>

                                </tr>
                                <tr class="order-total">
                                    <th>Grand Total</th>
                                    <td data-title="Total"><strong><span class="amount">${{ $grandTotal }}</span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Proceed to checkout</button>
                    </div>
                </div>
            </div>
        @else
            <br/><br/>
            <h1 class="text-center">Login Now</h1>
            <br/><br/>
        @endif

    </div>
</main>
@endsection {{-- End of main section --}}
