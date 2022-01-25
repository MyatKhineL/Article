@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Edit Category</div>
                    <div class="card-body">

                        <form action="{{route('category.update',$category->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="row align-items-center">
                                <div class="col-6 col-lg-3">
                                    <label>Add Category</label>
                                    <input type="name" name="title" value="{{$category->title}}" class="form-control @error('title') is-invalid @enderror">

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
