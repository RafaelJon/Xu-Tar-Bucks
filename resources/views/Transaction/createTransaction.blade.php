@extends('master')

@section('content')
    <br>
    <div class="container">
        <p class="h1 text-center font-weight-bold">Create Transaction</p>
        <form class="form" action="{{route('insert-new-transaction')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Customer Name</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Customer Name Here" name="user_name">
                    <div style="color:red;">
                        @error('user_name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Drinks</label>
                <div class="col-lg-10">
                    <select class="form-control-lg form-control" name="drink_id" id="">
                        <optgroup label="Coffee">
                            @foreach($drinks as $drink) 
                                @if($drink->drink_type_id == 1)
                                    <option value="{{$drink->id}}">{{$drink->drink_name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Tea">
                            @foreach($drinks as $drink) 
                                @if($drink->drink_type_id == 2)
                                    <option value="{{$drink->id}}">{{$drink->drink_name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Milk Tea">
                            @foreach($drinks as $drink) 
                                @if($drink->drink_type_id == 3)
                                    <option value="{{$drink->id}}">{{$drink->drink_name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        <optgroup label="Chocolate">
                            @foreach($drinks as $drink) 
                                @if($drink->drink_type_id == 4)
                                    <option value="{{$drink->id}}">{{$drink->drink_name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                    </select>
                    <div style="color:red;">
                        @error('drink_name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Toppings</label>
                <div class="col-lg-10">
                    <select class="form-control form-control-lg" multiple="multiple" name="toppings[]" id="">
                        @foreach($toppings as $top)
                            <option value="{{$top->id}}">{{$top->topping_name}}</option>
                        @endforeach
                    </select>
                    <div style="color:red;">
                        @error('toppings')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <div class="row col-4">
                    <label class="col-lg-5 col-form-label col-form-label-lg">Drink Size</label>
                    <div class="col-lg-7">
                        <div>
                            @foreach($sizes as $size)
                                <div>
                                    <input class="form-check-input-lg" type="radio" name="drink_size" value="{{$size->id}}">
                                    <label class="col-form-label col-form-label-lg">
                                        {{$size->size_type_name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div style="color:red;">
                        @error('drink_size')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="row col-4">
                    <label class="col-lg-5 col-form-label col-form-label-lg">Sugar Level</label>
                    <div class="col-lg-7">
                        <div>
                            @foreach($sugars as $sugar)
                                <div>
                                    <input class="form-check-input-lg" type="radio" name="sugar_level" value="{{$sugar->id}}">
                                    <label class="col-form-label col-form-label-lg">
                                        {{$sugar->sugar_type_name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div style="color:red;">
                        @error('sugar_level')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="row col-4">
                    <label class="col-lg-5 col-form-label col-form-label-lg">Ice Level</label>
                    <div class="col-lg-7">
                        <div>
                            @foreach($ices as $ice)
                                <div>
                                    <input class="form-check-input-lg" type="radio" name="ice_level" value="{{$ice->id}}">
                                    <label class="col-form-label col-form-label-lg">
                                        {{$ice->ice_type_name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div style="color:red;">
                        @error('ice_level')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Create Transaction</button>
            </div>
        </form>
    </div>
    <br>
@endsection