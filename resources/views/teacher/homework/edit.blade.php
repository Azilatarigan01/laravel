@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm mx-auto">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Edit Homework</h5>
        </div>
        <div class="card-body p-4">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form method="POST" action="{{ route('teacher.homework.update', $getRecord->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-start">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="class">Class<span style="color:red">*</span></label>
                            <select class="form-control" id="getClass" name="class_id" required>
                                <option value="">Select Class</option>
                                @foreach ($getClass as $class)
                                    <option {{ ($getRecord->class_id == $class->class_id) ? 'selected' : ''}} value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subject">Subject<span style="color:red">*</span></label>
                            <select class="form-control" id="getSubject" name="subject_id" required>
                                <option value="">Select Subject</option>
                                @foreach ($getSubject as $subject)
                                <option {{ ($getRecord->subject_id == $subject->subject_id) ? 'selected' : ''}} value="{{ $subject->subject_id }}">{{ $subject->subject_name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="homework_date">Homework Date <span style="color:red">*</span></label>
                            <input type="date" value="{{ $getRecord->homework_date }}" class="form-control" id="homework_date" name="homework_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="submission_date">Submission Date</label>
                            <input type="date" value="{{ $getRecord->submission_date }}" class="form-control" id="submission_date" name="submission_date" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="document">Document</label>
                            <input type="file" class="form-control" id="document" name="document_file">
                            @if(!empty($getRecord->getDocument()))
                            <a href="{{ $getRecord->getDocument() }}" class="btn btn-primary btn-sm" download>Download</a>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" style="height: 300px">{{ $getRecord->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(){
        $('#getClass').change(function(){
            var class_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('teacher.ajax_get_subject') }}", // Periksa apakah URL ini benar
                data : {
                    "_token": "{{ csrf_token() }}",
                    class_id : class_id,
                },
                dataType :"json",
                success:function(response){
                    $('#getSubject').empty();
                    $('#getSubject').append(response.success);
                }
            });
        });
    });
</script>
@endsection
