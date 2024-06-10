@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Exam Schedule</h5>
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
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="mb-0">Search Exam Schedule</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                </div>
            </div>
            <form action="{{ route('exam_schedule') }}" method="GET">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Exam</label>
                            <select class="form-control" name="exam_id" id="exam_id" required>
                                <option value="">Select Exam</option>
                                @foreach ($getExam as $exam)
                                    <option {{ (Request::get('exam_id') == $exam->id) ? 'selected':'' }} value="{{ $exam->id }}">{{ $exam->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Class</label>
                            <select class="form-control" name="class_id" id="class_id" required>
                                <option value="">Select Class</option>
                                @foreach ($getClass as $class)
                                    <option {{ (Request::get('class_id') == $class->id) ? 'selected':'' }} value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button class="btn btn-primary mr-2" type="submit">Search</button>
                        <a href="{{ route('exam_schedule') }}" class="btn btn-success ml-md-2">Reset</a>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                @if (!empty($getRecord))
                    <form action="{{ route('exam_schedule_insert') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                        <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                        <h5 class="mb-0">Exam Schedule</h5>
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Exam Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Room</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($getRecord as $value)
                                    <tr>
                                        <td>{{ $value['subject_name'] }}</td>
                                        <input type="hidden" class="form-control" value="{{ $value['subject_id'] }}" name="schedule[{{ $i }}][subject_id]">
                                        <td>
                                            <input type="date" class="form-control" value="{{ $value['exam_date'] }}" name="schedule[{{ $i }}][exam_date]">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" value="{{ $value['start_time'] }}" name="schedule[{{ $i }}][start_time]">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" value="{{ $value['end_time'] }}" name="schedule[{{ $i }}][end_time]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $value['room_number'] }}" name="schedule[{{ $i }}][room_number]">
                                        </td>
                                    </tr> 
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary text-white">Submit</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
