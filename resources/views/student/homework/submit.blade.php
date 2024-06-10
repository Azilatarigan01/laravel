@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm mx-auto">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Submit My Homework</h5>
        </div>
        <div class="card-body p-4">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <form method="POST" action="{{ route('student.my_homework.submit_homework.insert', ['id' => $getRecord->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-start">          
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="document">Document<span style="color:red">*</span></label>
                            <input type="file" class="form-control" id="document" name="document_file" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description<span style="color:red">*</span></label>
                            <textarea id="description" name="description" class="form-control" style="height: 300px" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
