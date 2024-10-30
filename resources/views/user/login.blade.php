<!DOCTYPE html>
<html>
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>E-warung</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- Font Awesome style -->
</head>
<body>
    <div class="container-fluid bg-primary py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        <div class="alert alert-danger">{{ $err }}</div>
                    @endforeach
                @endif
                <div class="card">
                    <div class="card-header bg-primary text-white">Login</div>
                    <div class="card-body">
                        <form action="{{ route('login.action') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <input id="password" class="form-control" type="password" name="password" />
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <button class="btn btn-primary">Login</button>
                                <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
                            </div>
                        </form>
                        <div class="mt-3 text-center">
                            <p class="text-dark">Belum punya akun? <a href="{{ route('register') }}" class="text-primary">Daftar di sini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
