@extends('layout.template')

@section('content')
 <!-- slider section -->
 <section class="slider_section ">
    <div class="slider_bg_box">
       <img src="images/slider-bg.jpg" alt="">
    </div>
    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
       <div class="carousel-inner">
          <div class="carousel-item active">
             <div class="container ">
                <div class="row">
                   <div class="col-md-7 col-lg-6 ">
                      <div class="detail-box">
                         <h1>
                            <span>
                            Sale 20% Off
                            </span>
                            <br>
                            On Everything
                         </h1>
                         <p>
                        Ayo belanja kebutuhan pokok kalian disini,mudah simpel dan efisien   
                        </p>
                         <div class="btn-box">
                            <a href="{{route('product')}}" class="btn1">
                            Shop now
                            </a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
    </div>
 </section>
</div>

{{-- <!-- Header -->
<header class="bg-primary text-white py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center">
            <h1 class="display-4 fw-bolder">Warung Nanda</h1>
            <p class="lead fw-normal text-white-75 mb-0">Penuhi kebutuhan rumah tangga Anda di Warung Nanda</p>
        </div>
    </div>
</header> --}}

<!-- Search Form -->
<div class="py-1 bg-light">
    <div class="container text-center">
        <h2 class="fw-semibold fs-6 mb-2">Search product</h2>
        <form action="{{ route('home') }}" method="GET" class="d-flex justify-content-center">
            <input class="form-control me-1 form-control-sm px-3 mr-2" type="search" name="query" placeholder="Cari produk..." aria-label="Search" value="{{ $query ?? '' }}" style="width: 500px;height:50px">
            <button class="btn btn-outline-danger btn-sm" style="width: 80px;height:50px" type="submit">Cari</button>
        </form>
    </div>
</div>



<!-- Barang yang Tersedia -->
{{-- <div class="py-4 bg-light">
    <div class="container text-center">
        <h2 class="display-4 fw-semibold fs-4">Barang yang Tersedia</h2>
    </div>
</div> --}}

<!-- Product section -->
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Our <span>products</span></h2>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{ route('orders.create', $product) }}" class="option1">Pesan sekarang</a>
                          
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="/images/{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 100%; height: auto;">
                    </div>
                                      
                    <div class="detail-box">
                        <h5>{{ $product->name }}</h5>
                        <h6>${{ $product->harga }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="btn-box">
            <a href="#">View All products</a>
        </div>
    </div>
</section>



<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

@endsection
