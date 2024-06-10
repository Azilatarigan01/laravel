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
            @if(count($getRecord) > 0)
                @foreach ($getRecord as $value)
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5 class="mb-0">{{ $value['name'] }}</h5>
                    </div>
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
                        @foreach ($value['exam'] as $valueS)
                            <tr>
                                <td>{{ $valueS['subject_name'] }}</td>
                                <td>{{ date('l', strtotime($valueS['exam_date'])) }}</td> 
                                <td>{{ date('d-m-Y', strtotime($valueS['exam_date'])) }}</td>
                                <td>{{ date('h:i A', strtotime($valueS['start_time'])) }}</td>
                                <td>{{ date('h:i A', strtotime($valueS['end_time'])) }}</td>
                                <td>{{ $valueS['room_number'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>                
                @endforeach
            @else
                <div class="alert alert-info">
                    No exam schedules available.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
