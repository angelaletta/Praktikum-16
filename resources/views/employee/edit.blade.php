@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $pageTitle }}</h1>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control"
                       value="{{ old('firstName', $employee->firstname) }}" required>
                @error('firstName')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control"
                       value="{{ old('lastName', $employee->lastname) }}" required>
                @error('lastName')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ old('email', $employee->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control"
                       value="{{ old('age', $employee->age) }}" required>
                @error('age')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select name="position" id="position" class="form-control" required>
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}"
                            {{ $position->id == $employee->position_id ? 'selected' : '' }}>
                            {{ $position->name }}
                        </option>
                    @endforeach
                </select>
                @error('position')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cv" class="form-label">Upload CV (PDF)</label>
                @if ($employee->encrypted_filename)
                    <p>File saat ini: <a href="{{ route('employees.download', $employee->id) }}" target="_blank">
                            {{ $employee->original_filename }}
                        </a></p>
                @endif
                <input type="file" name="cv" id="cv" class="form-control" accept=".pdf">
                @error('cv')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
