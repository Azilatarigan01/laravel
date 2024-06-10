@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">My Class & Subject</h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="mb-0">My Class & Subject</h5>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Subject Type</th>
                        <th scope="col" class="text-center">Create Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecords as $record)
                    <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $record->class_name }}</td>
                         <td>{{ $record->subject_name }}</td>
                         <td>{{ $record->subject_type }}</td>
                         <td class="text-center">{{ $record->created_at->format('d-m-Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
