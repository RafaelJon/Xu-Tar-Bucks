@extends('master')

@section('content')
    <br>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <form action="{{route('insert-drink')}}" method="get">
                <button type="submit" class="btn btn-primary">
                    Insert new Drink
                </button>
            </form>
        </nav>
        <br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">
                        <div class="float-right" style="padding-right: 35px;">
                            Action        
                        </div>    
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($drinks as $drink)
                <tr>
                    <td>
                        <img src="storage/{{$drink->drink_picture}}" alt="no image available" style="width: 100px; height: 100px; object-fit: cover;">
                    </td>  
                    <td>
                        {{$drink->drink_name}}
                    </td>  
                    <td>
                        {{$drink->drink_price}}
                    </td>  
                    <td>
                        {{$drink->type->drink_type_name}}
                    </td>  
                    <td>
                        <div class="offset-lg-6">
                            <form action="{{route('update-drink', ['id' => $drink->id])}}" method="get">
                                <button type="submit" class="btn btn-outline-info btn-block">edit</button>
                            </form>
                            <form action="{{route('delete-drink', ['id' => $drink->id])}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-block">delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection