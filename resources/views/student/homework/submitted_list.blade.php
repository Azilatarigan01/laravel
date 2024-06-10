@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0">My Submitted Homework</h3>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <h4 class="mb-0">My Submitted Homework List</h4>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Class</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Homework Date</th>
                        <th scope="col">Submission Date</th>
                        <th scope="col">Homework Document</th>
                        <th scope="col">Homework Description</th>
                        <th scope="col" class="text-center">Homework Created Date</th>
                        <th scope="col">Submitted Document</th>
                        <th scope="col">Submitted Description</th>
                        <th scope="col" class="text-center">Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->class_name }}</td>
                            <td>{{ $value->subject_name }}</td>
                            <td>{{ date('d-m-Y', strtotime($value->getHomework->homework_date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($value->getHomework->submission_date)) }}</td>
                            <td class="text-center">
                                @if(!empty($value->getHomework->getDocument()))
                                    <a href="{{ $value->getHomework->getDocument() }}" class="btn btn-primary btn-sm" download>Download</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{!! nl2br(e($value->getHomework->description)) !!}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($value->getHomework->created_at)) }}</td>
                            <td class="text-center">
                                @if(!empty($value->getDocument()))
                                    <a href="{{ $value->getDocument() }}" class="btn btn-primary btn-sm" download>Download</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{!! nl2br(e($value->description)) !!}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {!! $getRecord->appends(request()->except('page'))->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
