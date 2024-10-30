@extends('layoutadmin.template')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Halaman Barang</h2>
  <div class="card-body">

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.create') }}"> 
            <i class="fa fa-plus"></i> Masukan barang baru
        </a>
    </div>
    <form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
    action="{{ route('products.index') }}" method="GET">
    <div class="input-group">
        <input type="text" name="query" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th width="80px">No</th>
                <th>Foto</th>
                <th>Nama barang</th>
                <th>tanggal kadaluarsa</th>
                <th>Harga</th>
                <th width="250px">Action</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/images/{{ $product->image }}" width="100px"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>{{ $product->harga }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}">
                            <i class="fa-solid fa-list"></i> Show
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">There are no data.</td>
            </tr>
        @endforelse
        </tbody>

    </table>

    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

  </div>
</div>
@endsection
