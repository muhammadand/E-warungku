@extends('layoutadmin.template')

@section('content')
<div class="container mt-4">
    <h2>Pendaftaran Beasiswa</h2>
    <a href="{{ route('registrations.create') }}" class="btn btn-primary mb-3">Register New Student</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Document</th> <!-- Column for document -->
                <th>Status ajuan</th> <!-- New column for status -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $registration->name }}</td>
                <td>{{ $registration->email }}</td>
                <td>{{ $registration->phone_number }}</td>
                <td>{{ $registration->semester }}</td>
                <td>{{ $registration->gpa }}</td>
                <td>
                    @if($registration->document)
                    <p><strong></strong> <a href="{{ asset('uploads/documents/' . $registration->document) }}" target="_blank">View Document</a></p>
                @endif
                </td>
                <td>
                    @if($registration->is_verified)
                        <span class="badge bg-success">Verified</span>
                    @else
                        <span class="badge bg-danger">Not Verified</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('registrations.show', $registration->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('registrations.edit', $registration->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $registrations->links() }}
</div>
@endsection
