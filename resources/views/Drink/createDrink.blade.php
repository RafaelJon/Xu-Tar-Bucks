@extends('master')

@section('content')
    <br>
    <div class="container">
        <p class="h1 text-center font-weight-bold">Insert Drink</p>
        <form class="form" action="{{route('insert-new-drink')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Drink Name</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Drink Name Here" name="drink_name">
                    <div style="color:red;">
                        @error('drink_name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Drink Price</label>
                <div class="col-lg-10">
                    <input class="form-control form-control-lg" type="text" placeholder="Input Drink Price Here" name="drink_price">
                    <div style="color:red;">
                        @error('drink_price')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Drink Type</label>
                <div class="col-lg-10">
                    <div>
                        @foreach($drinkTypes as $type)
                            <div>
                                <input class="form-check-input-lg" type="radio" name="drink_type" value="{{$type->id}}">
                                <label class="form-check-label col-form-label-lg" >
                                    {{$type->drink_type_name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div style="color:red;">
                        @error('drink_type')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label col-form-label-lg">Drink Picture</label>
                <div class="form-group">
                    <input type="file" class="form-control-file form-control-lg" id="drink_picture" name="drink_picture">
                    <div class="col-lg-10" style="color:red;">
                        @error('drink_picture')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="text-center">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Insert Drink</button>
            </div>
        </form>
    </div>
@endsection