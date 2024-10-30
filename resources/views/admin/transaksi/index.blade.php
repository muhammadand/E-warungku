@extends('admin.layout.app')
@section('content')
<div class="row">
    <h1>Data Transaksi</h1>

    <!-- Modal Import -->
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
                    <form action="{{ url('admin/customers/import') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="file" name="file" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <a href="{{ url('/admin/transaksi/create') }}" class="btn bg-gradient-warning"><i class="fas fa-plus"></i> Tambah Data Transaksi</a>
    </div>

    <table class="table align-items-center mb-0" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Tanggal Wedding</th>
                <th>Status</th>
                <th>Pelanggan Id</th>
                <th>Layanan Id</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Tanggal Wedding</th>
                <th>Status</th>
                <th>Pelanggan Id</th>
                <th>Layanan Id</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($transaksi as $c)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->tanggal }}</td>
                <td>{{ $c->tgl_wedding }}</td>
                <td>{{ $c->status }}</td>
                <td>{{ $c->pelanggan_id }}</td>
                <td>{{ $c->layanan_id }}</td>
                <td>
                    <!-- Delete Button with Modal -->
                    <button type="button" class="btn btn-md btn-danger px-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $c->id }}">
                        <i class="fa-solid fa-trash"> Delete</i>
                    </button>
                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus <strong>{{ $c->nama }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ url('admin/transaksi/delete/' . $c->id) }}" type="button" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Button with Modal -->
                    <button type="button" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $c->id }}">
                        <i class="fas fa-edit"></i>
                    </button>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/transaksi/update/' . $c->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $c->tanggal }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="tgl_wedding" class="form-label">Tanggal Wedding</label>
                                            <input type="date" class="form-control" id="tgl_wedding" name="tgl_wedding" value="{{ $c->tgl_wedding }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="status" name="status" value="{{ $c->status }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pelanggan_id" class="form-label">Pelanggan Id</label>
                                            <input type="number" class="form-control" id="pelanggan_id" name="pelanggan_id" value="{{ $c->pelanggan_id }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="layanan_id" class="form-label">Layanan Id</label>
                                            <input type="number" class="form-control" id="layanan_id" name="layanan_id" value="{{ $c->layanan_id }}" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin.transaksi.show', ['id' => $c->id]) }}" class="btn btn-md btn-info">
        <i class="fas fa-eye"></i> Show
    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
