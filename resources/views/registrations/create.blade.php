@extends('layoutadmin.template')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Input Data Mahasiswa</h2>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('registrations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select name="semester" class="form-control" required onchange="updateGPA(this)">
                                @for ($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="gpa" class="form-label">IPK</label>
                            <input type="text" id="gpa" name="gpa" class="form-control" value="{{ old('gpa', $gpa) }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="scholarship_type" class="form-label">Scholarship Type</label>
                            <select id="scholarship_type" name="scholarship_type" class="form-control" disabled>
                                <option value="">None</option>
                                <option value="academic">Academic</option>
                                <option value="non_academic">Non-Academic</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="document" class="form-label">Upload Document (JPG, PNG)</label>
                            <input type="file" name="document" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                            <a href="{{ route('registrations.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateGPA(semesterSelect) {
            const gpaInput = document.getElementById('gpa');
            const scholarshipSelect = document.getElementById('scholarship_type');
            const semester = semesterSelect.value;

            if (semester == 7) {
                gpaInput.value = '3.18';
            } else {
                gpaInput.value = (Math.random() * (2.99 - 2) + 2).toFixed(2);
            }

            // Enable or disable the scholarship dropdown based on GPA
            const gpa = parseFloat(gpaInput.value);
            if (gpa >= 3) {
                scholarshipSelect.disabled = false;
            } else {
                scholarshipSelect.disabled = true;
                scholarshipSelect.value = ''; // Clear the selection
            }
        }

        // Initial setup to ensure the dropdown is disabled when the page loads
        document.addEventListener('DOMContentLoaded', () => {
            const semesterSelect = document.querySelector('select[name="semester"]');
            updateGPA(semesterSelect); // Call updateGPA to set initial state
        });
    </script>
</div>
@endsection
