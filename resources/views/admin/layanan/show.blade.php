@extends('admin.layout.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Detail Layanan</h4>
            </div>
            <div class="card-body">

                <ul class="list-group">
                    <li class="list-group-item"><strong>Kode:</strong> {{ $layanan->kode }}</li>
                    <li class="list-group-item"><strong>Nama Layanan:</strong> {{ $layanan->nama_layanan }}</li>
                    <li class="list-group-item"><strong>Deskripsi:</strong> {{ $layanan->deskripsi }}</li>
                    <li class="list-group-item"><strong>Harga:</strong> {{ $layanan->harga }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ url('admin/layanan/index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
