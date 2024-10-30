@extends('admin.layout.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Detail Pelanggan</h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>ID:</strong> {{ $pelanggan->id }}</li>
                    <li class="list-group-item"><strong>Nama:</strong> {{ $pelanggan->nama }}</li>
                    <li class="list-group-item"><strong>Nomor Telepon:</strong> {{ $pelanggan->no_tlp }}</li>
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</li>
                    <li class="list-group-item"><strong>User ID:</strong> {{ $pelanggan->user_id }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="{{ url('admin/pelanggan/index') }}" class="btn btn-primary">Kembali </a>
            </div>
        </div>
    </div>
</div>
@endsection
