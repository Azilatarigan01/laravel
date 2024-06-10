@extends('layouts.app')

@section('container')
<div class="container my-4">
  <div class="card text-center mt-4">
    <div class="card-header">
      Dashboard
    </div>
    <div class="card-body">
      <h5 class="card-title">Selamat Datang Student</h5>
      <p class="card-text">Di SMA Tuna Bangsa</p>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
    <div class="col">
      <div class="card card-clickable" onclick="location.href='{{ url('student/my_subject') }}">
        <img src="{{ asset('assets/img/kelas.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Subjcet</h5>
          <p class="card-text">Mata Pelajaran saya</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-clickable" onclick="location.href='{{ route('student.homework.list') }}'">
        <img src="{{ asset('assets/img/subject.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Homework</h5>
          <p class="card-text">Tugas Saya</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-clickable" onclick="location.href='{{ url('student/my_exam_timetable') }}'">
        <img src="{{ asset('assets/img/tugas.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Exam Schedule</h5>
          <p class="card-text">Jadwal Ujian Saya</p>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection
