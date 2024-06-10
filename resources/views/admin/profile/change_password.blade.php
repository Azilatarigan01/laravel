@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0">Ganti Password</h5>
                </div>
                <div class="card-body p-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.change_password.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Password Saat Ini</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required placeholder="Masukkan Password Saat Ini">
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required placeholder="Masukkan Password Baru">
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required placeholder="Konfirmasi Password Baru">
                        </div>

                        <!-- Elemen berbeda berdasarkan peran -->
                        @if ($user_type == 1)
                            <div class="alert alert-info">
                                Anda masuk sebagai Admin.
                            </div>
                        @elseif ($user_type == 2)
                            <div class="alert alert-info">
                                Anda masuk sebagai Teacher.
                            </div>
                        @elseif ($user_type == 3)
                            <div class="alert alert-info">
                                Anda masuk sebagai Student.
                            </div>
                        @endif

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
