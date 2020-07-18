@extends('master')

@section('content')
    <br>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <form action="{{route('insert-transaction')}}" method="get">
                <button type="submit" class="btn btn-primary">
                    Create new Transaction
                </button>
            </form>            
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search by Drink Name" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </nav>
        <div class="col-lg-10" style="color: red;">
            {{$errors->first()}}
        </div>
        <br>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">User</th>
                    <th scope="col">Drink</th>
                    <th scope="col">Size</th>
                    <th scope="col">Ice</th>
                    <th scope="col">Sugar</th>
                    <th scope="col">Topping</th>
                    <th scope="col">Total</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $tran)
                <tr>  
                    <td>
                        {{$tran->id}}
                    </td>  
                    <td>
                        {{$tran->user->user_name}}
                    </td>  
                    <td>
                        <img src="/storage/{{$tran->drink->drink_picture}}" alt="no image available" style="width: 100px; height: 100px; object-fit: cover;">
                        <br>
                        {{$tran->drink->drink_name}}
                    </td>  
                    <td>
                        {{$tran->size->size_type_name[0]}}
                    </td>
                    <td>
                        {{$tran->ice->ice_type_name}}
                    </td> 
                    <td>
                        {{$tran->sugar->sugar_type_name}}
                    </td>
                    <td>
                        @foreach($tran->topping as $td)
                            • {{$td->topping_name}}
                            <br>
                        @endforeach
                    </td> 
                    <td>
                        {{$total[$loop->index]}}
                    </td> 
                    <td>
                        {{ Carbon\Carbon::parse($tran->transaction_date)->format('d, M Y')}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$transactions->links()}}
    </div>
@endsection