@extends('rapidtheme/rapidextend')

@section('title')
Home | All User
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::User()->name }} <span class="badge badge-success">Active</span>
                    <b style = "float: right"> Total Users <span class="badge badge-info">{{count($alluser)}}</span> </b>
                </div>    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    Good Day!
                     <br><br>
                    
                    <div class="table-responsive-sm">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Join</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- View all users at home page -->
                                @foreach($alluser as $alluser_view)
                                    <tr>
                                        <!-- <th scope="row"</th> -->
                                        <td>{{$alluser_view->id}}</td>
                                        <td>{{$alluser_view->name}}</td>
                                        <td>{{$alluser_view->email}}</td>
                                        <td>{{$alluser_view->created_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
