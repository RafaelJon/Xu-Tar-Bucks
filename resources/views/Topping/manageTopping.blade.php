@extends('master')

@section('content')
    <br>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <form action="{{route('insert-topping')}}" method="get">
                <button type="submit" class="btn btn-primary">
                    Insert new Topping
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
                    <th scope="col">
                        <div class="float-right" style="padding-right: 35px;">
                            Action        
                        </div>    
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($toppings as $topping)
                <tr>
                    <td>
                        <img src="storage/{{$topping->topping_picture}}" alt="no image available" style="width: 100px; height: 100px; object-fit: cover;">
                    </td>  
                    <td>
                        {{$topping->topping_name}}
                    </td>  
                    <td>
                        {{$topping->topping_price}}
                    </td>  
                    <td>
                        <div class="offset-lg-8">
                            <form action="{{route('update-topping', ['id' => $topping->id])}}" method="get">
                                <button type="submit" class="btn btn-outline-info btn-block">edit</button>
                            </form>
                            <form action="{{route('delete-topping', ['id' => $topping->id])}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit"class="btn btn-outline-danger btn-block">delete</button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection