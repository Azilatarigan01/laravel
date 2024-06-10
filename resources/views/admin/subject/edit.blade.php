@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Edit Subject</h5>
        </div>
        <div class="card-body p-4">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('subject.update', $record->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Subject Type</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $record->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Subject Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="Teori" {{ $record->type == 'Teori' ? 'selected' : '' }}>Teori</option>
                        <option value="Praktikum" {{ $record->type == 'Praktikum' ? 'selected' : '' }}>Praktikum</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0" {{ $record->status == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ $record->status == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
