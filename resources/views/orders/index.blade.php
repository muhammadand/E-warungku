@extends('layout.template')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Pembelian</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Pesan</th> <!-- Ubah level menjadi rasa -->
                    <th scope="col">Tanggal Pembelian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->rasa }}</td> <!-- Ubah level menjadi rasa -->
                    <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>
</div>
@endsection
