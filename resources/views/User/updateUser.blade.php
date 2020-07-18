@extends('master')

@section('content')
    <br>
    <div class="container">
        <p class="h1 text-center font-weight-bold">Update Customer</p>
        <form class="form" action="{{route('edit-user', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Customer Name</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Customer Name Here" name="user_name" value="{{$user->user_name}}">
                    <div style="color:red;">
                        @error('user_name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Customer DOB</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Customer DOB Here (YYYY-MM-DD)" name="user_dob" value="{{$user->user_dob}}">
                    @error('user_dob')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Customer Phone</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Customer Phone Here" name="user_phone" value="{{$user->user_phone}}">
                    @error('user_phone')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Update Customer</button>
            </div>
        </form>
    </div>
    <br>
    <div class="container">
        <table class="table">
            <thead class="thead-light">
                <tr>
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
                        {{$tran->transaction_date}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
@endsection