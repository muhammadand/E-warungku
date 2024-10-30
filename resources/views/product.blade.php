@extends('layout.template')

@section('content')
  <!-- inner page section -->
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
 <!-- end product section -->
@endsection
