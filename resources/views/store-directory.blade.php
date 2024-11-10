@extends("layoutes.app") {{-- Extends common layoute from layoutes folder --}}

@section("title") Store Directory | Electro - Responsive Website Template @endsection {{-- Pass dynamicaly page title --}}

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
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Store Directory</li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container">
        <div class="mb-4 mb-md-6 text-center">
            <h1>Store Directory</h1>
        </div>
        <div class="mb-8">
            <div class="row no-gutters ec-store-directory align-items-start">
                <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                    <li><a href="#">12.3 inch</a></li>
                    <li><a href="#">Ending Offers</a></li>
                    <li><a href="#">Gadgets</a>
                        <ul>
                            <li><a href="#">Gadgets &amp; Accesories</a></li>
                            <li><a href="#">Smartwatches</a></li>
                            <li><a href="#">Wearables</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Smart Phones &amp; Tablets</a>
                        <ul>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Chargers</a></li>
                            <li><a href="#">Powerbanks</a></li>
                            <li><a href="#">Smartphones</a>
                                <ul>
                                    <li><a href="#">4G LTE Smartphone</a></li>
                                    <li><a href="#">Cables</a></li>
                                    <li><a href="#">Chargers</a></li>
                                    <li><a href="#">Covers</a></li>
                                    <li><a href="#">Featured Phones</a></li>
                                    <li><a href="#">Holders</a></li>
                                    <li><a href="#">Mobile Phones</a></li>
                                    <li><a href="#">Mobiles Accesories</a></li>
                                    <li><a href="#">Powerbanks</a></li>
                                    <li><a href="#">Unlocked Phone</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Smartphones &amp; Tablets</a></li>
                            <li><a href="#">Smartphones &amp; Tablets</a></li>
                            <li><a href="#">Tablets</a>
                                <ul>
                                    <li><a href="#">Featured Tablets</a></li>
                                    <li><a href="#">Tablet Accesories</a></li>
                                    <li><a href="#">Tablet Accessories</a></li>
                                    <li><a href="#">Tablet PCs</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">TV &amp; Audio</a>
                        <ul>
                            <li><a href="#">Audio</a></li>
                            <li><a href="#">Audio Speakers</a></li>
                            <li><a href="#">Portable Audio</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                    <li><a href="#">15 inch</a></li>
                    <li><a href="#">Computer Components</a>
                        <ul>
                            <li><a href="#">Computer Cases</a></li>
                            <li<a href="#">Desktops</a></li>
                            <li><a href="#">Monitors</a></li>
                            <li><a href="#">Software</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Gadgets &amp; Accesories</a></li>
                    <li><a href="#">Printers &amp; Ink</a>
                        <ul>
                            <li><a href="#">Printers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Uncategorized</a></li>
                </ul>
                <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                    <li><a href="#">17 inch</a></li>
                    <li><a href="#">Car Electronic &amp; GPS</a></li>
                    <li><a href="#">GPS &amp; Navi</a></li>
                    <li><a href="#">Office Supplies</a></li>
                    <li><a href="#">Video Games &amp; Consoles</a>
                        <ul>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Action Games</a></li>
                            <li><a href="#">Game Consoles</a></li>
                            <li><a href="#">Racing Games</a></li>
                            <li><a href="#">Station Consoles</a></li>
                            <li><a href="#">Video Games &amp; Consoles</a></li>
                            <li><a href="#">Xbox</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="col-md-3 border-top border-color-1 mb-4 mb-md-0">
                    <li><a href="/accessories/">Accessories</a>
                        <ul>
                            <li><a href="#">Cases</a></li>
                            <li><a href="#">Chargers</a></li>
                            <li><a href="#">Headphone Accessories</a></li>
                            <li><a href="#">Headphone Cases</a></li>
                            <li><a href="#">Headphones</a>
                                <ul>
                                    <li><a href="#">Earbuds and In-ear</a></li>
                                    <li><a href="#">Kids' Headphones</a></li>
                                    <li><a href="#">Over-Ear and On-Ear</a></li>
                                    <li><a href="#">PC Gaming Headsets</a></li>
                                    <li><a href="#">Pro &amp; DJ Headphones</a></li>
                                    <li><a href="#">Refurbished Headphones</a></li>
                                    <li><a href="#">Refurbished Headphones</a></li>
                                    <li><a href="#">Waterproof Headphones</a></li>
                                    <li><a href="#">Wireless and Bluetooth</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Pendrives</a></li>
                            <li><a href="#">Power Banks</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Cameras &amp; Photography</a>
                        <ul>
                            <li><a href="#">Cameras</a></li>
                            <li><a href="#">Photo Cameras</a></li>
                            <li><a href="#">Photo Cameras</a></li>
                            <li><a href="#">Video Cameras</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Home Entertainment</a>
                        <ul>
                            <li><a href="#">Blue-ray Players</a></li>
                            <li><a href="#">DVD Players</a></li>
                            <li><a href="#">Home &amp; Audio Enternteinment</a></li>
                            <li><a href="#">Home &amp; Audio Enternteinment</a></li>
                            <li><a href="#">Home Theatres</a></li>
                            <li><a href="#">Projectors</a></li>
                            <li><a href="#">Speakers</a></li>
                            <li><a href="#">TVs</a>
                                <ul>
                                    <li><a href="#">3D Tvs</a></li>
                                    <li><a href="#">4k Ultra HD TVs</a></li>
                                    <li><a href="#">Curved TVs</a></li>
                                    <li><a href="#">LED TVs</a></li>
                                    <li><a href="#">OLED TVs</a></li>
                                    <li><a href="#">Smart TVs</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Laptops &amp; Computers</a>
                        <ul>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">All in One</a></li>
                            <li><a href="#">Computer Accessories</a></li>
                            <li><a href="#">Computer Monitors</a></li>
                            <li><a href="#">Computers</a></li>
                            <li><a href="#">Desktop Computers</a></li>
                            <li><a href="#">Desktop PCs &amp; Laptops</a></li>
                            <li><a href="#">Desktop PCs &amp; Laptops</a></li>
                            <li><a href="#">Gaming</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Mac Computers</a></li>
                            <li><a href="#">Networking</a></li>
                            <li><a href="#">Notebooks</a></li>
                            <li><a href="#">Peripherals</a></li>
                            <li><a href="#">Refurbished Laptops</a></li>
                            <li><a href="#">Servers</a></li>
                            <li><a href="#">Software</a></li>
                            <li><a href="#">Ultrabooks</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Brand Carousel -->
        <div class="mb-8">
            <div class="py-2 border-top border-bottom">
                <div class="js-slick-carousel u-slick my-1"
                    data-slides-show="5"
                    data-slides-scroll="1"
                    data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                    data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                    data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                    data-responsive='[{
                        "breakpoint": 992,
                        "settings": {
                            "slidesToShow": 2
                        }
                    }, {
                        "breakpoint": 768,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }, {
                        "breakpoint": 554,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }]'>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img1.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img2.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img3.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img4.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img5.png" alt="Image Description">
                        </a>
                    </div>
                    <div class="js-slide">
                        <a href="#" class="link-hover__brand">
                            <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img6.png" alt="Image Description">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Carousel -->
    </div>
</main>
@endsection {{-- End of main section --}}

