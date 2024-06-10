<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>SMA Tuna Bangsa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo 1.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo 1.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <style>
    .card-img-top {
      width: 100%;
      height: 200px;
      /* Sesuaikan tinggi gambar */
      object-fit: cover;
    }

    .card-clickable {
      cursor: pointer;
    }

    .card-clickable:hover {
      box-shadow: 0 0 11px rgba(33, 33, 33, .2);
    }
  </style>
</head>

<body>
  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center"></section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo">
        <a href="landing" class="logo">
          <img src="{{ asset('assets/img/logo 1.png') }}" alt="">
        </a>
        <a href="landing">SMA Tuna Bangsa</a>
      </h1>
      <nav id="navbar" class="navbar">
        @if(Auth::user()->user_type == 1)
        <ul>
            <li><a class="nav-link {{ request()->is('admin/admin*') ? 'active' : '' }}" href="/admin/admin/list">Admin Access</a></li>
            <li><a class="nav-link {{ request()->is('admin/student*') ? 'active' : '' }}" href="/admin/student/list">Students</a></li>
            <li><a class="nav-link {{ request()->is('admin/teacher*') ? 'active' : '' }}" href="/admin/teacher/list">Teachers</a></li>
            <li class="dropdown">
                <a class="nav-link dropdown-toggle {{ request()->is('admin/subject*') || request()->is('admin/assign_subject*') || request()->is('admin/assign_class_teacher*') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Academics
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="/admin/class/list">Classes</a></li>
                    <li><a class="dropdown-item" href="/admin/subject/list">Subjects</a></li>
                    <li><a class="dropdown-item" href="/admin/assign_subject/list">Classes and Subjects</a></li>
                    <li><a class="dropdown-item" href="/admin/assign_class_teacher/list">Teacher Class Assignments</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.homework.list') }}">Homework</a></li>
                </ul>
            </li>
            <li class="dropdown">
              <a class="nav-link dropdown-toggle {{ request()->is('admin/subject*') || request()->is('admin/assign_subject*') || request()->is('admin/assign_class_teacher*') ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Examinations
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="/admin/examinations/exam/list">Exam</a></li>
                  <li><a class="dropdown-item" href="/admin/examinations/exam_schedule">Exam Schedule</a></li>
                  
              </ul>
          </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ route('admin.account') }}">My Account</a></li>
                    <li>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        @elseif(Auth::user()->user_type == 2)
        <ul>
          <li><a class="nav-link {{ request()->is('kelas*') ? 'active' : '' }}" href="{{ route('teacher.myclasssubject') }}">My Class & Subject</a></li>
          <li><a class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}" href="{{ route('teacher.mystudent') }}">My Student</a></li>
          <li><a class="nav-link {{ request()->is('siswa*') ? 'active' : '' }}" href="{{ route('teacher.homework.list') }}">Homework</a></li>
          <li><a class="nav-link {{ request()->is('my_exam_timetable*') ? 'active' : '' }}" href="{{ url('teacher/my_exam_timetable') }}">My Exam Schedule</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('teacher.account') }}">My Account</a></li> <!-- Tambahkan menu ganti password di sini -->
                  <li>
                      <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                  </li>
              </ul>
          </li>
      </ul>
        @elseif(Auth::user()->user_type == 3)
        <ul>
          <li><a class="nav-link {{ request()->is('my_subject*') ? 'active' : '' }}" href="{{ url('student/my_subject') }}">My Subject</a></li>
          <li><a class="nav-link {{ request()->is('my_subject*') ? 'active' : '' }}" href="{{ route('student.homework.list') }}">My Homework</a></li>
          <li><a class="nav-link {{ request()->is('my_subject*') ? 'active' : '' }}" href="{{ route('student.my_submitted_homework.list') }}">My Submitted Homework</a></li>
          <li><a class="nav-link {{ request()->is('my_exam_timetable*') ? 'active' : '' }}" href="{{ url('student/my_exam_timetable') }}">My Exam Schedule</a></li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="{{ route('student.account') }}">My Account</a></li> <!-- Tambahkan menu ganti password di sini -->
                <li>
                      <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                  </li>
              </ul>
          </li>
      </ul>
        @endif
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <!-- Content Section -->
  @yield('container')

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.w