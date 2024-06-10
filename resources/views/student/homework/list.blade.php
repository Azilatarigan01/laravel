@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">My Homework</h5>
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
                    <h5 class="mb-0">My Homework List</h5>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Homework Date</th>
                        <th scope="col">Submission Date</th>
                        <th scope="col">Document</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Created Date</th>
                        <th scope="col" class="text-center">Action</th>
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
                            <td>{!! nl2br(e($value->description)) !!}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                            <td class="text-center">
                                <a href="{{ route('student.my_homework.sumbit_homework', $value->id) }}" class="btn btn-primary btn-sm">Submit Homework</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(request()->except('page'))->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
