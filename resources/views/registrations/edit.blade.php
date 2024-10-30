@extends('layoutadmin.template')

@section('content')
<div class="container mt-4">
    <h2>Edit pendaftaran</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('registrations.update', $registration->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $registration->name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $registration->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $registration->phone_number }}" required>
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select name="semester" class="form-control" required>
                @for ($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}" {{ $registration->semester == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="gpa" class="form-label">IPK</label>
            <input type="number" step="0.01" name="gpa" class="form-control" value="{{ $registration->gpa }}" required>
        </div>

        <div class="mb-3">
            <label for="scholarship_type" class="form-label">Scholarship Type</label>
            <select name="scholarship_type" class="form-control">
                <option value="">None</option>
                <option value="academic" {{ $registration->scholarship_type == 'academic' ? 'selected' : '' }}>Academic</option>
                <option value="non_academic" {{ $registration->scholarship_type == 'non_academic' ? 'selected' : '' }}>Non-Academic</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="document" class="form-label">Upload Document (JPG, PNG)</label>
            <input type="file" name="document" class="form-control">
            @if($registration->document)
                <small>Current Document: <a href="{{ asset('uploads/documents/' . $registration->document) }}" target="_blank">View</a></small>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
