@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Add New Teacher</h5>
        </div>
        <div class="card-body p-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('teacher.insert') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="inputFirstName" class="form-label">First Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('name') }}" name="name" required placeholder="Enter first name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputLastName" class="form-label">Last Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" required placeholder="Enter last name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputEmail" class="form-label">Email <span style="color: red;">*</span></label>
                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" required placeholder="Enter email">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputGender" class="form-label">Gender <span style="color: red;">*</span></label>
                        <select class="form-control" required name="gender">
                            <option value="">Select Gender</option>
                            <option value="Laki-Laki" {{ old('gender') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDateOfBirth" class="form-label">Date of Birth <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('date_of_birth') }}" name="date_of_birth" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputAdmissionDate" class="form-label">Date of Joining <span style="color: red;">*</span></label>
                        <input type="date" class="form-control" value="{{ old('admission_date') }}" name="admission_date" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputMobileNumber" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="Enter mobile number">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputMaritalStatus" class="form-label">Marital Status</label>
                        <select class="form-control" required name="marital_status">
                            <option value="">Select Marital Status</option>
                            <option value="0" {{ old('marital_status') == '0' ? 'selected' : '' }}>Single</option>
                            <option value="1" {{ old('marital_status') == '1' ? 'selected' : '' }}>Married</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" value="{{ old('address') }}" name="address" placeholder="Enter address">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputProfilePic" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" name="profile_pic" accept="image/*">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputStatus" class="form-label">Status</label>
                        <select class="form-control" required name="status">
                            <option value="">Select Status</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Active</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <hr />
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" required placeholder="Enter password">
                </div>
                <div class="mb-3">
                    <label for="inputPasswordConfirmation" class="form-label">Confirm Password <span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password_confirmation" required placeholder="Confirm password">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary text-white">Add Teacher</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
