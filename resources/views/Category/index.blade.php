@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Category List</div>
                    <div class="card-body">
                           <div class="d-flex justify-content-between mb-3">
                               <div>
                                   <a class="btn btn-outline-primary" href="{{route('category.create')}}">
                                       Create <i class="fas fa-plus-circle"></i>
                                   </a>

                               </div>
                               <div class="">
                                   @isset(request()->search)
                                       <a href="{{route('category.index')}}" class="btn btn-outline-dark">
                                           <i class="fas fa-list"></i>
                                           All Categories
                                       </a>
                                       <span class="h5">Search by : "{{request()->search}}"</span>
                                   @endif
                               </div>

                               <div class="">
                                   <form action=""  method="get">
                                       <div class="d-flex">
                                           <input name="search" type="text" class="form-control" placeholder="Search" value="{{request('search')}}">
                                           <button class="btn btn-outline-info" type="submit">
                                               <i class="fas fa-search"></i>
                                           </button>
                                       </div>
                                   </form>
                               </div>
                           </div>

                        @if(session('up'))
                              <div class="alert alert-success">{{session('up')}}</div>
                        @endif



                        @if(session('del'))
                            <div class="alert alert-danger">{{session('del')}}</div>
                        @endif


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
                                                 <td>{{$category->user->name ?? "Unknown User" }}</td>

                                                 <td>
                                                     <a class="btn btn-outline-warning" href="{{route('category.edit',$category->id)}}">
                                                         <i class="fas fa-pencil-alt"></i>
                                                     </a>
                                                     <form action="{{route('category.destroy',$category->id)}}" method="post" class="d-inline-block">
                                                         @method('delete')
                                                         @csrf
                                                         <button class="btn btn-outline-danger">
                                                             <i class="fas fa-trash"></i>
                                                         </button>

                                                     </form>
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
                           <div class="d-flex justify-content-between">
                               {{$categories->appends(request()->all())->links()}}
                               <p class="fw-bolder mb-0 h4">Total :: {{$categories->Total()}}</p>
                           </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
