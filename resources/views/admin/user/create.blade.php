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
<form method="POST" action="{{url('/admin/user/store')}}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="text10" class="col-4 col-form-label">TAMBAH DATA USER</label>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Username</label>
        <div class="col-8">
            <input id="text1" name="username" placeholder="Masukan Username Anda" type="text"
                class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Email</label>
        <div class="col-8">
            <input id="text1" name="email" placeholder="Masukan email Anda" type="text"
                class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Password</label>
        <div class="col-8">
            <input id="text" name="password" placeholder="Masukan Password Anda" type="password"
                class="form-control @error('password') is-invalid @enderror">
            @error('paswword')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn bg-gradient-success">Submit</button>
            <a href="{{url('/admin/user/index')}}" class="btn bg-gradient-secondary"><i class="fas fa-long-arrow-alt-left"></i>
                Back to Table</a>
        </div>
    </div>
</form>
@endsection