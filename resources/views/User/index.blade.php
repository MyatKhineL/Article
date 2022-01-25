@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User List <i class="fas fa-list"></i></div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>Admin</td>
                                <td>
                                <a class="btn btn-outline-warning" href="{{route('user.edit',$user->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                                </a>

                                <a class="btn btn-outline-success">
                                <i class="fas fa-upload"></i>
                                </a>

                                <form action="{{route('user.destroy',$user->id)}}" method="post" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger">
                                <i class="fas fa-trash"></i>
                                </button>
                                </form>

                                </td>
                                <td>
                                    {{$user->created_at->format("d/m/Y")}}<br>
                                    {{$user->created_at->format("h:i:a")}}
                                </td>
                               
                            </tr>
                            @empty
                                <tr>
                                <td colspan="5" class="text-center">There is no Category</td>
                                </tr>
                            @endforelse
                        </tbody>
                              
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
