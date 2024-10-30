@extends('layout.template')

@section('content')
<div class="container mt-5">
    <h2>Pembelian</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detail barang</h5>
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/{{ $product->image }}" alt="Product Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h3>{{ $product->name }}</h3>
                    <p>Tanggal kadaluarsa : {{ $product->detail }}</p>
                    <p>Price: ${{ $product->harga }}</p>
                    <!-- Add any other details you want to display about the product -->
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <!-- Input field for quantity -->
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1">
                        </div>
                        <!-- Input field for delivery location (Rasa) -->
                        <div class="mb-3">
                            <label for="taste" class="form-label">Tulis pesan :</label>
                            <input type="text" class="form-control" id="rasa" name="rasa" placeholder="pesan untuk penjual">
                        </div>
                        <button type="submit" class="btn btn-danger mt-3">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
