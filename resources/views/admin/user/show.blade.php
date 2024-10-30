@extends('admin.layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Detail Pengguna</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <th width="30%">Username</th>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>{{ $user->role }}</td>
                            </tr>
                            <!-- Tambahkan detail lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
            <a href="{{ url('admin/user/index') }}" class="btn btn-primary">Kembali</a>

            </div>
        </div>
    </div>
</div>
@endsection
