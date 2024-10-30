@extends('admin.layout.app')
@section('content')

{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{url('/admin/transaksi/store')}}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA TRANSAKSI</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">tanggal</label>
        <div class="col-8">
            <input id="text1" name="tanggal" placeholder="Masukan tanggal Anda" type="date"
                class="form-control @error('tanggal') is-invalid @enderror">
            @error('tanggal')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">tanggal wedding</label>
        <div class="col-8">
            <input id="text" name="tgl_wedding" placeholder="Masukan Tanggal Wedding Anda" type="date"
                class="form-control @error('password') is-invalid @enderror">
            @error('tgl_wedding')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">status</label>
        <div class="col-8">
            <input id="text" name="status" placeholder="Masukan Status Anda" type="text"
                class="form-control @error('status') is-invalid @enderror">
            @error('status')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
                <label for="pelanggan_id" class="col-4 col-form-label">Pelanggan ID</label> 
                <div class="col-8">
                    <select id="pelanggan_id" name="pelanggan_id" class="custom-select @error('pelanggan_id') is-invalid @enderror">
                        @foreach ($pelanggan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama}}</option>
                        @endforeach
                    </select>
                    @error('')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="layanan_id" class="col-4 col-form-label">Layanan ID</label> 
                <div class="col-8">
                    <select id="layanan_id" name="layanan_id" class="custom-select @error('layanan_id') is-invalid @enderror">
                        @foreach ($layanan as $l)
                            <option value="{{ $l->id }}">{{ $l->kode}}</option>
                        @endforeach
                    </select>
                    @error('')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>


    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Submit</button>
            <a href="{{url('/admin/transaksi/index')}}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i>
                Back to Table</a>
        </div>
    </div>
</form>
@endsection