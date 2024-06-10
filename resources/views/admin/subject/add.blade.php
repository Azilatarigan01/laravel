@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Add New Subject</h5>
        </div>
        <div class="card-body p-4">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <form method="POST" action="">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="inputName" class="form-label">Subject Name</label>
                    <input type="text" class="form-control" name="name" required placeholder="Masukkan Nama Mata Pelajaran">
                </div>
                <div class="mb-3">
                    <label class="form-label">Subject Type</label>
                    <select class="form-control" name="type" required>
                        <option value="Teori">Teori</option>
                        <option value="Praktikum">Praktikum</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-control" name="status">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary text-white">Add Subject</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
