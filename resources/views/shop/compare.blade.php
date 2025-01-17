@extends("layoutes.app") {{-- Extends common layoute from layoutes folder --}}

@section("title") Compare | Electro - Responsive Website Template @endsection {{-- Pass dynamicaly page title --}}

{{-- *********************************** Start main section *********************************** --}}
@section("main")
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Home</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Compare</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="table-responsive table-bordered table-compare-list mb-10 border-0">
            <table class="table">
                <tbody>
                    <tr>
                        <th class="min-width-200">Product</th>
                        <td>
                            <a href="#" class="product d-block">
                                <div class="product-compare-image">
                                    <div class="d-flex mb-3">
                                        <img class="img-fluid mx-auto" src="/assets/img/212X200/img1.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <h3 class="product-item__title text-blue font-weight-bold mb-3">Protection Plan for MacBook Air / 13 inch MacBook Pro</h3>
                            </a>
                            <div class="text-warning mb-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="product">
                                <div class="product-compare-image">
                                    <div class="d-flex mb-3">
                                        <img class="img-fluid mx-auto" src="/assets/img/212X200/img6.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <h3 class="product-item__title text-blue font-weight-bold mb-3">Purple NX Mini F1 aparat  SMART NX</h3>
                            </a>
                            <div class="text-warning mb-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="product">
                                <div class="product-compare-image">
                                    <div class="d-flex mb-3">
                                        <img class="img-fluid mx-auto" src="/assets/img/212X200/img7.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <h3 class="product-item__title text-blue font-weight-bold mb-3">White Solo 2 Wireless</h3>
                            </a>
                            <div class="text-warning mb-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="product">
                                <div class="product-compare-image">
                                    <div class="d-flex mb-3">
                                        <img class="img-fluid mx-auto" src="/assets/img/212X200/img8.jpg" alt="Image Description">
                                    </div>
                                </div>
                                <h3 class="product-item__title text-blue font-weight-bold mb-3">Tablet Red EliteBook Revolve 810 G2</h3>
                            </a>
                            <div class="text-warning mb-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="far fa-star text-muted"></small>
                                <small class="far fa-star text-muted"></small>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>
                            <div class="product-price">$250.00</div>
                        </td>
                        <td>
                            <div class="product-price">$559.00</div>
                        </td>
                        <td>
                            <div class="product-price">$248.99</div>
                        </td>
                        <td>
                            <div class="product-price">$2,299.00</div>
                        </td>
                    </tr>

                    <tr>
                        <th>Availability</th>
                        <td><span>In stock</span>
                        </td><td><span>82 in stock</span>
                        </td><td><span>73 in stock</span>
                        </td><td><span>54 in stock</span>
                        </td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td>
                            <ul>
                                <li><span class="">Intel Core i5 processors (13-inch model)</span></li>
                                <li><span class="">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                <li><span class="">Flash storage</span></li>
                                <li><span class="">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                <li><span class="">Force Touch trackpad (13-inch model)</span></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li><span class="">No more blur and noise</span></li>
                                <li><span class="">Cloud storage</span></li>
                                <li><span class="">HD video recording</span></li>
                                <li><span class="">Perfect for Selfies</span></li>
                                <li><span class="">Enjoy advanced editing capabilities with the bundled Adobe Photoshop Lightroom 5 software.</span></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li><span class="">Pair and Play with your Bluetooth® device with 30' range</span></li>
                                <li><span class="">12 hour rechargeable battery with Fuel Gauge</span></li>
                                <li><span class="">Take hands-free calls with built-in mic*</span></li>
                                <li><span class="">Fine-tuned acoustics for clarity, breadth and balance</span></li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li><span class="">Intel Core i5 processors (13-inch model)</span></li>
                                <li><span class="">Intel Iris Graphics 6100 (13-inch model)</span></li>
                                <li><span class="">Flash storage</span></li>
                                <li><span class="">Up to 10 hours of battery life2 (13-inch model)</span></li>
                                <li><span class="">Force Touch trackpad (13-inch model)</span></li>
                            </ul>
                        </td>
                    </tr>

                    <tr>
                        <th>Add to cart</th>
                        <td>
                            <div class=""><a href="#" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add to cart</a></div>
                        </td>
                        <td>
                            <div class=""><a href="#" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add to cart</a></div>
                        </td>
                        <td>
                            <div class=""><a href="#" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add to cart</a></div>
                        </td>
                        <td>
                            <div class=""><a href="#" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-3 px-xl-5">Add to cart</a></div>
                        </td>
                    </tr>
                    <tr>
                        <th>Sku</th>
                        <td>5487FB8/44</td>
                        <td>5487FB8/43</td>
                        <td>5487FB8/42</td>
                        <td>5487FB8/41</td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td>500g</td>
                        <td>40g</td>
                        <td>1759g</td>
                        <td>90g</td>
                    </tr>
                    <tr>
                        <th>Dimensions</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>brands</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>color</th>
                        <td>Red</td>
                        <td>Green</td>
                        <td>Blue</td>
                        <td>Yellow</td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td>
                            <div class="product-price price">$250.00</div>
                        </td>
                        <td>
                            <div class="product-price price">$559.00</div>
                        </td>
                        <td>
                            <div class="product-price price">$248.99</div>
                        </td>
                        <td>
                            <div class="product-price price">$2,299.00</div>
                        </td>
                    </tr>

                    <tr>
                        <th>Remove</th>
                        <td class="text-center">
                            <a href="#" class="text-gray-90"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="text-gray-90"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="text-gray-90"><i class="fa fa-times"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="#" class="text-gray-90"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection {{-- End of main section --}}


