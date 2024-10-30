@extends('layoutadmin.template')

@section('content')
<div class="container mt-4">
    <h2>Pendaftaran Details</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $registration->name }}</p>
            <p><strong>Email:</strong> {{ $registration->email }}</p>
            <p><strong>Phone Number:</strong> {{ $registration->phone_number }}</p>
            <p><strong>Semester:</strong> {{ $registration->semester }}</p>
            <p><strong>IPK:</strong> {{ $registration->gpa }}</p>
            <p><strong>beasiswa Type:</strong> {{ $registration->scholarship_type }}</p>
            @if($registration->document)
                <p><strong>Document:</strong> <a href="{{ asset('uploads/documents/' . $registration->document) }}" target="_blank">View Document</a></p>
            @endif
        </div>
    </div>
    <a href="{{ route('registrations.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
