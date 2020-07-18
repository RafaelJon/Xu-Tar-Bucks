@extends('master')

@section('content')
    <br>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <form action="{{route('insert-new-user')}}" class="form-inline" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="text" placeholder="Input Name here" name="name">
                <button type="submit" class="btn btn-primary my-2 my-sm-0" type="submit">Create new Customer</button>
            </form>
        </nav>
        <div class="col-lg-12">
            @if(session()->has('successInsert'))
                <div class="alert alert-success">
                    {{ session()->get('successInsert') }}
                </div>
            @endif
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div> 
            @enderror
        </div>
        <br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">
                        <div class="float-right" style="padding-right: 35px;">
                            Action        
                        </div>    
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->user_name}}</td>  
                    <td>
                        <div class="offset-lg-10">
                            <form action="{{route('update-user', ['id' => $user->id])}}" method="get">
                                <button class="btn btn-outline-info btn-block">edit</button>
                            </form>
                            <form action="{{route('delete-user', (['id' => $user->id]))}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-danger btn-block">delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection