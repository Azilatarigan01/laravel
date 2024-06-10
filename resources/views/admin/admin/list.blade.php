@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Admin List</h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="mb-0">Admin List</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ url('admin/admin/add') }}" class="btn btn-primary text-white">Add New Admin</a>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Create Date</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($getRecords as $record)
                        <tr>
                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                            <td class="text-center align-middle">
                                @if($record->profile_pic)
                                    <img src="{{ asset('uploads/profile_pics/' . $record->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded" style="max-width: 100px; height: auto;">
                                @else
                                    <span class="text-muted">No Photo</span>
                                @endif
                            </td>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->email }}</td>
                        <td class="text-center">{{ $record->created_at->format('d-m-Y') }}</td>
                        <td>
                          <a href="{{ url('admin/admin/edit', $record->id) }}" class="btn btn-primary">Edit</a>
                          <form action="{{ route('admin.delete', $record->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
