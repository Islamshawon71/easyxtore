@extends('layouts.website')

@section('content')
    <section class = "container pt-4 mb-4">
        <div class = "row">
            <div class="col-xl-6 px-2 mb-3">
                <div class="h-100 bg-light rounded-lg p-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <span class="badge badge-danger">Sale</span>
                            @foreach($product->images as $image)
                            <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                <img class="d-block w-100 img-thumbnail" src="{{ asset('application/public/product/'.$image->ImageUrl) }}" alt="First slide">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-xl-6 px-2 mb-3">
                <div class="h-100 bg-light rounded-lg px-4 py-4">
                    <h1 class="h4">{{ $product->ProductName }}</h1>
                    <div class="h4 font-weight-normal text-accent">
                        <div class="product-price">
                            {!! $product->htmlPrice() !!}
                        </div>
                    </div>

                    <p style="display: inline-block; font-size: 16px;background: #64C284;color: #fff;padding: 1px 8px;border-radius: 20px;">প্রোডাক্ট কোড : {{ $product->ProductSku }}</p>
                    <div class="quantity">
                        <p class="mb-2">পরিমাণ :
                            <button class="minus-btn" type="button" name="button">-</button>
                            <input type="text" name="name" id="custom-quantity" value="1">
                            <button class="plus-btn" type="button" name="button">+</button>
                        </p>
                    </div>
                    <div class="form-group d-flex pt-2 pb-2">
                        <button class="btn btn-success btn-sm mr-3 mb-3 d-sm-block add-to-cart" data-id="3" data-title="D-Link DWP-157 3G Usb Edge Modem" data-quantity="1" data-price="1850" type="button"> <b>অর্ডার করুন</b></button>
                        <button class="btn btn-primary btn-sm mr-3 mb-3 only-add-to-cart" data-id="3" data-title="D-Link DWP-157 3G Usb Edge Modem" data-quantity="1" data-price="1850" type="button"> <b>কার্ট-এ যোগ করুন</b></button>
                    </div>

                    <div class="accordion mb-4" id="productPanels">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="accordion-heading bg-secondary">
                                    <a class="" href="#" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="shippingOptions">
                                        <i class="czi-delivery text-muted lead align-middle mt-n1 mr-2"></i> Shipping options
                                    </a>
                                </h3>
                            </div>
                            <div class="collapse show" id="" data-parent="#productPanels" style="">
                                <div class="card-body font-size-sm">
                                    <div class="d-flex justify-content-between border-bottom pb-2">
                                        <div>
                                            <div class="font-weight-semibold text-dark"><b>Courier Condition</b></div>
                                            <div class="font-size-sm text-muted">2 - 4 days</div>
                                        </div>
                                        <div>100 TK</div>
                                    </div>
                                    <div class="d-flex justify-content-between py-2">
                                        <div>
                                            <div class="font-weight-semibold text-dark"><b>Dhaka Cash On Delivery</b></div>
                                            <div class="font-size-sm text-muted">1 - 2 Days</div>
                                        </div>
                                        <div>70 Taka</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-xl-12 px-2 mb-3">
                <div class="bg-light rounded-lg">
                        <ul class="nav nav-tabs mb-0" role="tablist">
                            <li class="nav-item"><a class="nav-link p-4 active" href="#details" data-toggle="tab" role="tab" aria-selected="true"><b>Product details</b></a></li>
                        </ul>
                        <div class="tab-content pt-0 p-4">
                            <div class="tab-pane fade active show" id="details" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8">
                                        {!! $product->ProductDetails !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <section class = "container pt-4 mb-5">
        <div class = "row pt-2 mx-n2 product-archive ">
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">

                            অর্ডার করুন

                        </button>
                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast">
                            অর্ডার করুন
                        </button>

                    </div>
                </div>
            </div>
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 border">
                    <a class = "card-img-top d-block" href = "#"><img class="" src = "{{ asset('assets/img/shop/catalog/58.jpg') }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <a class = "product-meta d-block font-size-xs pb-1" href = "#">Headphones</a>
                        <h3 class = "product-title font-size-sm"><a href = "single.html">Wireless Bluetooth
                                Headphones</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price"><span class = "text-accent">৳ 198.<small>00</small></span></div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast"> অর্ডার করুন</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
