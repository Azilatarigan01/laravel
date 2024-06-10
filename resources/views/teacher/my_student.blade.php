@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">My Student </h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="mb-0">My Student</h5>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" class="text-center align-middle" style="min-width: 50px;">No</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 100px;">Photo</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">First Name</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">Last Name</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 200px;">Email</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">Admission Number</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">Admission Date</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 100px;">Roll Number</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">Class Name</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 100px;">Gender</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">Date of Birth</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">Religion</th>
                            <th scope="col" class="text-center align-middle" style="min-width: 150px;">Mobile Number</th>
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
                            <td class="text-center align-middle">{{ $record->name }}</td>
                            <td class="text-center align-middle">{{ $record->last_name }}</td>
                            <td class="text-center align-middle">{{ $record->email }}</td>
                            <td class="text-center align-middle">{{ $record->admission_number }}</td>
                            <td class="text-center align-middle">{{ $record->admission_date }}</td>
                            <td class="text-center align-middle">{{ $record->roll_number }}</td>
                            <td class="text-center align-middle">{{ $record->class_name }}</td>
                            <td class="text-center align-middle">{{ $record->gender }}</td>
                            <td class="text-center align-middle">
                                @if(!empty($record->date_of_birth))
                                    {{ date('d-m-Y', strtotime($record->date_of_birth)) }}
                                @endif
                            </td>
                            <td class="text-center align-middle">{{ $record->religion }}</td>
                            <td class="text-center align-middle">{{ $record->mobile_number }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
