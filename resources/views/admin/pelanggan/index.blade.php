@extends('admin.layout.app')
@section('content')
<div class="row">
    <h1>Data Pelanggan</h1>
    <!-- Import Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/customers/import') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <input type="file" name="file">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <a href="{{ url('/admin/pelanggan/create') }}" class="btn bg-gradient-warning"><i class="fas fa-plus"></i> Tambah Data Pelanggan</a>
    </div>
    
    <table class="table align-items-center mb-0" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>User_id</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>User</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($pelanggan as $c)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->nama }}</td>
                <td>{{ $c->alamat }}</td>
                <td>{{ $c->no_tlp }}</td>
                <td>{{ $c->user_id }}</td>
                <td>
                    <!-- Edit Button trigger modal -->
                    <button type="button" class="btn btn-md btn-primary px-2" data-bs-toggle="modal" data-bs-target="#editModal{{ $c->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </button>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $c->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $c->id }}">Edit Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/pelanggan/update/' . $c->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $c->nama }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_tlp">No Telepon</label>
                                            <input type="text" class="form-control" id="no_tlp" name="no_tlp" value="{{ $c->no_tlp }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $c->alamat }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_id">User ID</label>
                                            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $c->user_id }}" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Button trigger modal -->
                    <button type="button" class="btn btn-md btn-danger px-2" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $c->id }}">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button>
                    
                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModal{{ $c->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $c->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $c->id }}">Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus <strong>{{ $c->nama }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ url('admin/pelanggan/delete/' . $c->id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!-- Show Button -->
                   <a href="{{ route('admin.pelanggan.show', ['id' => $c->id]) }}" class="btn btn-md btn-info">
                        <i class="fas fa-eye"></i> Show
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
