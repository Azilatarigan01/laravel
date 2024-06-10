@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Edit admin</h5>
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

            <form method="POST" action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="inputFirstName" class="form-label">First Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $admin->name) }}" required placeholder="Enter first name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputLastName" class="form-label">Last Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name', $admin->last_name) }}" required placeholder="Enter last name">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputEmail" class="form-label">Email Address <span style="color: red;">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $admin->email) }}" required placeholder="Enter email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputGender" class="form-label">Gender <span style="color: red;">*</span></label>
                        <select class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                            <option value="Laki-Laki" {{ old('gender', $admin->gender) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ old('gender', $admin->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDateOfBirth" class="form-label">Date of Birth <span style="color: red;">*</span></label>
                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', $admin->date_of_birth) }}" required>
                        @error('date_of_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputReligion" class="form-label">Religion <span style="color: red;">*</span></label>
                        <input type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion', $admin->religion) }}" required placeholder="Enter religion">
                        @error('religion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputMobileNumber" class="form-label">Mobile Number <span style="color: red;">*</span></label>
                        <input type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{ old('mobile_number', $admin->mobile_number) }}" required placeholder="Enter mobile number">
                        @error('mobile_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputAdmissionDate" class="form-label">Admission Date <span style="color: red;">*</span></label>
                        <input type="date" class="form-control @error('admission_date') is-invalid @enderror" name="admission_date" value="{{ old('admission_date', $admin->admission_date) }}" required>
                        @error('admission_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputProfilePic" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic">
                        @if($admin->profile_pic)
                            <div class="mt-2">
                                <img src="{{ asset('uploads/profile_pics/' . $admin->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded" style="max-width: 100px;">
                            </div>
                        @endif
                        @error('profile_pic')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    <small class="form-text text-muted">If you want to change password, please enter a new password</small>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputPasswordConfirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary text-white">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
