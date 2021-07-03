@extends('rapidtheme/rapidextend')

@section('title')
All Category
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">All Category
                    <li style = "float: right">Total Category <span class="badge badge-info">{{$allcategory->total()}}</span> </li>
                </div>    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @if(Session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{Session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Added by</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allcategory as $allcategory_view)
                                <tr>
                                    <td>{{$allcategory_view->id}}</td>
                                    <td>{{$allcategory_view->category_name}}</td>
                                    <td>User {{$allcategory_view->user_id}}</td>
                                    <td>{{$allcategory_view->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('edit/category/' . $allcategory_view->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{url('delete/category/' . $allcategory_view->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- for paginate --}}
                    {{$allcategory->links()}}
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-header"> Add Category
                </div>    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('add.category')}}" method="post">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Add here</label>
                            <input type="text" name="category_name" class="form-control 
                                @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                          
                            @error('category_name')
                                <span class ="text-danger">{{$message}}</span>
                            @enderror    

                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add</button>
                    </form>

                </div>
            </div>
        </div>
 
        <div class="col-sm-8"><br>
            <div class="card">
                <div class="card-header"> Trash List
                </div>    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    {{-- @if(Session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{Session('success')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif --}}
                    
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead class=""> 
                                <tr>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Deleted by</th>
                                    <th scope="col">Deleted At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trashcategory as $trashcategory_view)
                                <tr>
                                    <td>{{$trashcategory_view->id}}</td>
                                    <td>{{$trashcategory_view->category_name}}</td>
                                    <td>User {{$trashcategory_view->user_id}}</td>
                                    <td>{{$trashcategory_view->deleted_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{url('restore/category/' . $trashcategory_view->id)}}" class="btn btn-primary btn-sm">Restore</a>
                                        <a href="{{url('force/delete/category/' . $trashcategory_view->id)}}" class="btn btn-danger btn-sm">Force Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- for paginate trash--}}
                    {{$trashcategory->links()}}
                </div>
            </div>
        </div>

        <div class="col-md-4">
        </div>

    </div>
</div>
@endsection
