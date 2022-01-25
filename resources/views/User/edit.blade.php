@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update User</div>
                <div class="card-body">
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group mb-3">
                         <label for="">Name</label>
                         <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                         @error('name')
                         <small class="text-danger"></small>
                         @enderror
                    </div>
                    <div class="form-group mb-3">
                         <label for="">Email</label>
                         <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                         @error('email')
                         <small class="text-danger"></small>
                         @enderror
                    </div>
                    <div class="form-group mb-3">
                         <label for="adminRole">Role</label>
                         <input type="checkbox" name="role" id="adminRole" class="form-check @error('role') is-invalid @enderror" value="{{$user->email}">
                         @error('role')
                         <small class="text-danger"></small>
                         @enderror
                    </div>
                    <button class="btn btn-outline-primary">
                    Update <i class="fas fa-upload"> </i>
                    </button>


            </div>
        </div>
    </div>
</div>
@endsection
