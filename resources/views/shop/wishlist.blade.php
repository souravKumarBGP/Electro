@extends("layoutes.app") {{-- Extend common layoutes from layoutes folder --}}

@section("title") Wishlist | Electro - Responsive Website Template @endsection {{-- Pass dynamic webpage title --}}

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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="my-6">
            <h1 class="text-center">My wishlist on Electro</h1>
        </div>
        <div class="mb-16 wishlist-table">
            <div class="table-responsive">
                <table class="table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-remove">&nbsp;</th>
                            <th class="product-thumbnail">&nbsp;</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Unit Price</th>
                            <th class="product-Stock w-lg-15">Stock Status</th>
                            <th class="product-subtotal min-width-200-md-lg">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $items)
                            <tr>
                                <td class="text-center">

                                    <form action="{{ route("wishlist.destroy", $items->productId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button  onclick="return confirm('Are you sure you want to remove this item from your wishlist?');" class="border-0 bg-transparent" type="submit" aria-label="Remove from wishlist">×</button>
                                    </form>

                                </td>
                                <td class="d-none d-md-table-cell">
                                    <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1" src="{{ asset("/storage/".$items->productThemainal) }}" alt="Image Description"></a>
                                </td>

                                <td data-title="Product">
                                    <a href="#" class="text-gray-90">{{ $items->productName }}</a>
                                </td>

                                <td data-title="Unit Price">
                                    <span class="">${{ $items->sellPrice }}</span>
                                </td>

                                <td data-title="Stock Status">

                                    {!! ($items->abalibleQuantity >= 1) ? "<span>In stock</span>" : "<span>Out of stock</span>" !!}

                                </td>

                                <td>
                                    <button type="button" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Add to Cart</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection {{-- End of main section --}}

