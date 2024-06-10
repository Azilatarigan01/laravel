@extends('layouts.app')

@section('container')
<div class="container my-4">
  <div class="card text-center mt-4">
    <div class="card-header">
      Dashboard
    </div>
    <div class="card-body">
      <h5 class="card-title">Selamat Datang Teacher</h5>
      <p class="card-text">Di SMA Tuna Bangsa</p>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
    <div class="col">
      <div class="card card-clickable" onclick="location.href='{{ route('teacher.myclasssubject') }}'">
        <img src="{{ asset('assets/img/kelas.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Class & Subjetc</h5>
          <p class="card-text">Kelola data kelas di sini.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-clickable" onclick="location.href='{{ route('teacher.mystudent') }}'">
        <img src="{{ asset('assets/img/student.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Student</h5>
          <p class="card-text">Kelola data siswa di sini.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-clickable" onclick="location.href='{{ route('teacher.homework.list') }}'">
        <img src="{{ asset('assets/img/subject.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">HomeWork</h5>
          <p class="card-text">Kelola data tugas di sini.</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-clickable" onclick="location.href='{{ url('teacher/my_exam_timetable') }}'">
        <img src="{{ asset('assets/img/tugas.jpg') }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">My Exam Schedule</h5>
          <p class="card-text">Kelola data ujian di sini.</p>
        </div>
      </div>
    </div>
    
    </div>
  </div>
</div>
@endsection
