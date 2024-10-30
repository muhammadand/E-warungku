@extends('admin.layout.app')

@section('content')
<div class="row">
    <h1>Data Layanan</h1>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/layanan/import') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="file" name="file">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ url('/admin/layanan/create') }}" class="btn bg-gradient-warning"><i class="fas fa-plus"></i> Tambah Data Layanan</a>
    </div>
    <table class="table align-items-center mb-0" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Layanan</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Deskripsi</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($layanan as $c)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->kode }}</td>
                <td>{{ $c->nama_layanan }}</td>
                <td>{{ $c->deskripsi }}</td>
                <td>{{ $c->harga }}</td>
                <td>
                    <a href="{{ url('admin/layanan/delete/' . $c->id) }}" class="btn btn-md btn-danger px-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $c->id }}">
                        <i class="fa-solid fa-trash"> Delete</i>
                    </a>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="deleteModal{{ $c->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $c->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $c->id }}">Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus <strong>{{ $c->nama_layanan }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ url('admin/layanan/delete/' . $c->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->
                    <a href="#" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $c->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $c->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $c->id }}">Edit Data Layanan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.layanan.update', $c->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="kode">Kode</label>
                                            <input type="text" class="form-control" id="kode" name="kode" value="{{ $c->kode }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_layanan">Nama Layanan</label>
                                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="{{ $c->nama_layanan }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $c->deskripsi }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control" id="harga" name="harga" value="{{ $c->harga }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <a href="{{ url('admin/layanan/show', ['id' => $c->id]) }}"
                        class="btn btn-md btn-info">
                        <i class="fas fa-eye"></i> Show
                    </a>
            </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
