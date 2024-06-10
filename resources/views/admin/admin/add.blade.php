@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Add New Admin</h5>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required placeholder="Enter name">
                </div>
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" required placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                </div>
                <div class="col-md-6 mb-3">
                        <label for="inputProfilePic" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" name="profile_pic" accept="image/*" placeholder="Upload Profile Picture">
                    </div>
                <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary text-white">Add Admin</button>
            </form>
        </div>
    </div>
</div>
@endsection
