@extends('admin.layout.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Detail Transaksi</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">ID: {{ $transaksi->id }}</li>
                    <li class="list-group-item">Tanggal: {{ $transaksi->tanggal }}</li>
                    <li class="list-group-item">Tanggal Wedding: {{ $transaksi->tgl_wedding }}</li>
                    <li class="list-group-item">Status: {{ $transaksi->status }}</li>
                    <li class="list-group-item">Pelanggan ID: {{ $transaksi->pelanggan_id }}</li>
                    <li class="list-group-item">Layanan ID: {{ $transaksi->layanan_id }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ url('admin/transaksi/index') }}" class="btn btn-primary">Kembali</a>
                
            </div>
        </div>
    </div>
</div>
@endsection
