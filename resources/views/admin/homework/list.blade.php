@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Homework</h5>
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
                    <h5 class="mb-0">Homework List</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ route('admin.homework.add') }}" class="btn btn-primary text-white">Add New Homework</a>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" style="width: 5%;">No</th>
                        <th scope="col" style="width: 15%;">Class</th>
                        <th scope="col" style="width: 15%;">Subject</th>
                        <th scope="col" style="width: 10%;">Homework Date</th>
                        <th scope="col" style="width: 10%;">Submission Date</th>
                        <th scope="col" style="width: 10%;">Document</th>
                        <th scope="col" class="text-center" style="width: 10%;">Created Date</th>
                        <th scope="col" class="text-center" style="width: 25%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->class_name }}</td>
                            <td>{{ $value->subject_name }}</td>
                            <td>{{ date('d-m-Y', strtotime($value->homework_date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($value->submission_date)) }}</td>
                            <td>
                                @if(!empty($value->getDocument()))
                                    <a href="{{ $value->getDocument() }}" class="btn btn-primary btn-sm" download>Download</a>
                                @endif
                            </td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                            <td class="text-center">
                                <div class="d-flex flex-wrap justify-content-center">
                                    <a href="{{ route('admin.homework.edit', $value->id) }}" class="btn btn-primary btn-sm mr-1 mb-1">Edit</a>
                                    <a href="{{ route('admin.homework.delete', $value->id) }}" class="btn btn-danger btn-sm mr-1 mb-1" onclick="return confirm('Are you sure you want to delete this homework?');">Delete</a>
                                    <a href="{{ route('admin.homework.submitted', $value->id) }}" class="btn btn-success btn-sm mb-1">Submitted Homework</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end" style="padding: 10px;">
                {!! $getRecord->appends(request()->except('page'))->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
