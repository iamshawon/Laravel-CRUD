@extends('rapidtheme/rapidextend')

@section('title')
Edit Category
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Edit Category
                </div>    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('update/category/' . $editcategory->id)}}" method="post">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Edit Category</label>
                            <input type="text" name="category_name" class="form-control 
                                @error('category_name') is-invalid @enderror" 
                                id="exampleInputEmail1" aria-describedby="emailHelp" 
                            value="{{$editcategory->category_name}}">
                          
                            @error('category_name')
                                <span class ="text-danger">{{$message}}</span>
                            @enderror    

                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
