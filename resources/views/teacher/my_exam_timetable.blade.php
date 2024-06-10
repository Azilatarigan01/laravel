@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">My Exam Schedule</h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (count($getRecord) > 0)
                @foreach ($getRecord as $class)
                    <div class="mb-3">
                        <h5 class="mb-0">
                            <span class="highlight">Class: {{ $class['class_name'] }}</span>
                        </h5>
                    </div>
                    @foreach ($class['exam'] as $exam)
                        <div class="mb-3">
                            <h6 class="mb-0">{{ $exam['exam_name'] }}</h6>
                        </div>
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Exam Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Room Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exam['subject'] as $subject)
                                    <tr>
                                        <td>{{ $subject['subject_name'] }}</td>
                                        <td>{{ date('l', strtotime($subject['exam_date'])) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($subject['exam_date'])) }}</td>
                                        <td>{{ date('h:i A', strtotime($subject['start_time'])) }}</td>
                                        <td>{{ date('h:i A', strtotime($subject['end_time'])) }}</td>
                                        <td>{{ $subject['room_number'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @endforeach
            @else
                <div class="alert alert-info">
                    No exam schedules available.
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .highlight {
        font-size: 1.25rem;
        color: #343a40;
        font-weight: bold;
    }

    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    .thead-light th {
        background-color: #f8f9fa;
    }
</style>
@endsection
