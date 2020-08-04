@extends('layouts.website')

@section('content')
    <section>
        <div class = "container py-xl-2">
            <div class = "row">
                <div class = "col-lg-10 order-xl-2 bg-secondary">
                    <div class="cz-carousel cz-dots-enabled cz-dots-light cz-dots-inside">
                        <div class="cz-carousel-inner"  >
                            <img src="{{ asset('assets/img/home/hero-slider/01.jpg') }}" alt="...">
                            <img src="{{ asset('assets/img/home/hero-slider/01.jpg') }}" alt="...">
                            <img src="{{ asset('assets/img/home/hero-slider/01.jpg') }}" alt="...">
                        </div>
                    </div>
                </div>
                <div class = "col-lg-2 mobile-area-off">
                    <ul class = "dropdown-menu d-block" style = "position: initial">
                        @foreach($categories as $category)
                            <li class = "dropdown">
                                <a class = "dropdown-item" href = "{{ $category->url() }}"> {{ $category->CategoryName }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class = "container pt-4 mb-5">
        <div class = "row pt-2 mx-n2 product-archive ">
            @foreach($products as $product)
            <!-- Product-->
            <div class = "col-xl-2 col-lg-6 col-md-4 col-sm-6 px-1 mb-2">
                <div class = "card product-card p-2 ">
                    <a class = "card-img-top d-block" href = "{{ $product->url() }}"><img class="img-thumbnail" src = "{{ asset('application/public/product/thumbnail/'.$product->imageUrl()) }}" alt = "Product"></a>
                    <div class = "card-body py-2 px-0">
                        <h3 class = "product-title font-size-sm"><a href = "{{ $product->url() }}">{{ $product->ProductName }}</a></h3>
                        <div class = "d-flex justify-content-between">
                            <div class = "product-price">{!! $product->htmlPrice() !!} </div>
                        </div>
                    </div>
                    <div class = "card-body py-0 px-0">
                        <button class = "btn btn-primary btn-sm btn-block" type = "button" data-toggle = "toast" data-target = "#cart-toast"> অর্ডার করুন </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
