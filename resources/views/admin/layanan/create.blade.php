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
<form method="POST" action="{{url('/admin/layanan/store')}}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA LAYANAN</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">kode</label>
        <div class="col-8">
            <input id="text1" name="kode" placeholder="Masukan kode Anda" type="text"
                class="form-control @error('nama') is-invalid @enderror">
            @error('kode')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">nama layanan</label>
        <div class="col-8">
            <input id="text" name="nama_layanan" placeholder="Masukan nama layanan Anda" type="text"
                class="form-control @error('password') is-invalid @enderror">
            @error('nama_layanan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">deskripsi</label>
        <div class="col-8">
            <input id="text" name="deskripsi" placeholder="Masukan deskripsi Anda" type="text"
                class="form-control @error('alamat') is-invalid @enderror">
            @error('deskripsi')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">harga</label>
        <div class="col-8">
            <input id="text" name="harga" placeholder="Masukan harga Anda" type="text"
                class="form-control @error('alamat') is-invalid @enderror">
            @error('harga')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Submit</button>
            <a href="{{url('/admin/layanan/index')}}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i>
                Back to Table</a>
        </div>
    </div>
</form>
@endsection