@extends('layouts.app')

@section('container')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">Daftar Kelas</h5>
        </div>
        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body p-4">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            <div class="row mb-3">
                <div class="col-md-6">
                    <h5 class="mb-0">Daftar Kelas</h5>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ url('admin/class/add') }}" class="btn btn-primary text-white">Tambah Kelas Baru</a>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created By</th>
                        <th scope="col" class="text-center">Created Date</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $record)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $record->name }}</td>
                        <td>
                            @if($record->status == 0)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </td>
                        <td>{{ $record->createdByUser->name }}</td>
                        <td>{{ date('d-m-y H:i A', strtotime($record->created_at)) }}</td>
                        <td>
                            <a href="{{ url('admin/class/edit', $record->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('class.delete', $record->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
