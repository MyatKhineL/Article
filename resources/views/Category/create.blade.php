@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Create Category</div>
                    <div class="card-body">
                         @if(session('add'))
                             <div class="alert alert-success">{{session('add')}}</div>
                         @endif
                          <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="row align-items-center">
                                  <div class="col-6 col-lg-3">
                                      <label>Add Category</label>
                                      <input type="name" name="title" class="form-control @error('title') is-invalid @enderror">

                                  </div>
                                  <div class="col-6 col-lg-3" style="margin-bottom: -23px;">
                                      <button class="btn btn-primary">
                                          <i class="fas fa-plus-circle"></i>
                                      </button>
                                  </div>
                              </div>
                              @error('title')
                              <small class="text-danger">{{$message}}</small>
                              @enderror
                          </form>
                          <hr>
                          <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Owner</th>
                                        <th>Actions</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                              <tbody>
                              @forelse($categories as $category)
                                  <tr>
                                      <td>{{$category->id}}</td>
                                      <td>{{$category->title}}</td>
                                      <td>{{$category->user->name ?? "Unknown User"}}</td>
                                      <td>
                                          <button class="btn btn-outline-warning">
                                              <i class="fas fa-pencil-alt"></i>
                                          </button>

                                      </td>
                                      <td>{{$category->created_at->format('H:i s')}}</td>

                                  </tr>
                              @empty
                                  <tr>
                                      <td colspan="4" class="text-center">There is no Category</td>
                                  </tr>

                              @endforelse
                              </tbody>
                          </table>
                          <div class="text-center">
                              <a href="{{route('category.index')}}" class="btn btn-outline-primary">All Categories</a>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
