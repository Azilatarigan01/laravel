@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Exam List</h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="mb-0">Exam List</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('exam_add') }}" class="btn btn-primary text-white">Add New Exam</a>
                </div>
            </div>
            <form action="{{ route('exam_list') }}" method="GET">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exam_name">Exam Name</label>
                            <input type="text" id="exam_name" class="form-control" value="{{ Request::get('exam_name') }}" name="exam_name" placeholder="Search by Exam Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="created_date">Create Date</label>
                            <input type="date" id="created_date" class="form-control" value="{{ Request::get('created_date') }}" name="created_date">
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button class="btn btn-primary mr-2" type="submit">Search</button>
                        <a href="{{ route('exam_list') }}" class="btn btn-success ml-md-2">Reset</a>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">Note</th>
                            <th scope="col">Created By</th>
                            <th scope="col" class="text-center">Create Date</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($getRecords as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->note }}</td>
                                <td>{{ $record->created_name }}</td>
                                <td class="text-center">{{ $record->created_at->format('d-m-Y') }}</td>
                                <td class="text-center">
                                    <a href="{{ route('exam_edit', $record->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('exam_delete', $record->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No exams found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
