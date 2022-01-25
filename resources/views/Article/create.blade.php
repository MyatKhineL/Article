@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Article</div>
                    <div class="card-body">
                           <form action="" method="post" enctype="multipart/form-data">
                               @csrf
                               <div class="mb-3">
                                   <label class="form-label">Article Title</label>
                                   <input type="text" name="title" class="form-control">
                               </div>
                               <div class="mb-3">
                                   <label class="form-label">Select Category</label>
                                   <select class="form-select" name="category">
                                      @foreach($categories as $category)
                                          <option value="{{$category->id}}">{{$category->title}}</option>
                                       @endforeach
                                   </select>
                               </div>

                           </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
