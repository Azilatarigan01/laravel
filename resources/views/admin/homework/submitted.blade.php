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
                    <h5 class="mb-0">Submit Homework List</h5>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Document</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                            <td>
                                @if(!empty($value->getDocument()))
                                    <a href="{{ $value->getDocument() }}" class="btn btn-primary btn-sm" download>Download</a>
                                @endif
                            </td>
                            <td>{{ $value->description }}</td>
                            <td class="text-center">{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
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
