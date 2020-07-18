@extends('master')

@section('content')
    <br>
    <div class="container">
        <p class="h1 text-center font-weight-bold">Update Topping</p>
        <form class="form" action="{{route('edit-topping', ['id' => $topping->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Topping Name</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Topping Name Here" name="topping_name" value="{{$topping->topping_name}}">
                    <div style="color:red;">
                        @error('topping_name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Topping Price</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Topping Price Here" name="topping_price" value="{{$topping->topping_price}}">
                    @error('topping_price')
                        <div style="color:red;">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Topping Picture</label>
                <div class="form-group">
                    <input type="file" class="form-control-file form-control-lg" id="topping_picture" name="topping_picture">
                </div>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Update Topping</button>
            </div>
        </form>
    </div>
@endsection