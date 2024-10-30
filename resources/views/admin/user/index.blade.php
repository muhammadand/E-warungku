@extends('admin.layout.app')

@section('content')
<div class="row">
    <h1>Data User</h1>
    <!-- Modal Import -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        @csrf
                        <div class="form-group">
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
        <a href="{{ url('/admin/pelanggan/create') }}" class="btn bg-gradient-warning">
            <i class="fas fa-plus"></i> Tambah Data Pelanggan
        </a>
    </div>
    <table class="table align-items-center mb-0" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($user as $u)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->password }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <a href="{{ url('admin/user/delete/' . $u->id) }}" class="btn btn-md btn-danger px-2"
                        data-bs-toggle="modal" data-bs-target="#deleteModal{{ $u->id }}">
                        <i class="fa-solid fa-trash"></i> Delete
                    </a>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteModal{{ $u->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus <strong>{{ $u->id }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <a href="{{ url('admin/user/delete/'.$u->id) }}" type="button"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="#" class="btn btn-md btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $u->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal{{ $u->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                    <button type="button" class="btn-close"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/user/update/' . $u->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="username"
                                                name="username" value="{{ $u->username }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                name="password" placeholder="Leave blank if not changing">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                name="email" value="{{ $u->email }}" required>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Show -->
                    <a href="{{ route('admin.user.show', ['id' => $u->id]) }}"
                        class="btn btn-md btn-info">
                        <i class="fas fa-eye"></i> Show
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
