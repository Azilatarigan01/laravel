@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Edit Assign Subject</h5>
        </div>
        <div class="card-body p-4">
            @if(session('error'))
                <div class="alert alert-danger">
                 {{ session('error') }}
                 </div>
            @endif

            <form id="editForm" method="POST" action="{{ route('assign_subject.update', $record->id) }}">
                @csrf
                @method('PUT') <!-- Menambahkan metode spoofing PUT -->
                <div class="mb-3">
                    <label for="class_id" class="form-label">Class Name</label>
                    <select class="form-control" name="class_id" id="class_id" required>
                        <option value="">Select Class</option>
                        @foreach ($getClass as $class)
                            <option value="{{ $class->id }}" {{ $record->class_id == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject_id" class="form-label">Subject Name</label>
                    @foreach ($getSubject as $subject)
                        <div>
                            <label style="font-weight: normal;">
                                <input type="radio" value="{{ $subject->id }}" name="subject_id" {{ $record->subject_id == $subject->id ? 'checked' : '' }}> {{ $subject->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="0" {{ $record->status == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ $record->status == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

