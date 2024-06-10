@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Assign Subject List</h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="mb-0">Assign Subject List</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary text-white">Add New Assign Subject</a>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created by</th>
                        <th scope="col" class="text-center">Create Date</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $record)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->class_name }}</td>
                        <td>{{ $record->subject_name }}</td>
                        <td>
                            @if($record->status == 0)
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>{{ $record->created_by_name }}</td>
                        <td>{{ date('d-m-y H:i A', strtotime($record->created_at)) }}</td>
                        <td class="text-center">
                            <a href="{{ url('admin/assign_subject/edit', $record->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('assign_subject.delete', $record->id) }}" method="POST" style="display: inline;">
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
