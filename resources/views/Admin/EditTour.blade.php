@extends('layouts.master')

@section('content')

    <form method="post" action="/admin/tour/save/{{$edittours->id}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Tourname</label>
            <input name="tourname" type="text" class="form-control" id="tourname" placeholder="{{$edittours->tourname}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Destination</label>
            <input name="destination" type="text" class="form-control" id="destination" placeholder="{{$edittours->destination}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">period</label>
            <input name="period" type="text" class="form-control" id="period" placeholder="{{$edittours->period}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Vehicle</label>
            <select name="vehicle" class="form-control" id="vehicle">
                <option>Airplane</option>
                <option>Train</option>
                <option>Ship</option>
                <option>Bus</option>
                <option>Offroad</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Agency</label>
            <input name="agency" type="text" class="form-control" id="agency_id" placeholder="{{$edittours->agency_id}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input name="price" type="number" class="form-control" id="price" placeholder="{{$edittours->price}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Hotel Name</label>
            <input name="hotel_name" type="text" class="form-control" id="hotel_name" placeholder="{{$edittours->hotel_name}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Hotel Rate</label>
            <select name="hotel_rate" class="form-control" id="hotel_rate">
                <option>5</option>
                <option>4</option>
                <option>3</option>
                <option>2</option>
                <option>1</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Image Url</label>
            <input name="cover" type="text" class="form-control" id="cover" placeholder="{{$edittours->cover}}"><img src="{{$edittours->cover}}" style="width:100px;height:100px">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <input name="description" type="text" class="form-control" id="description" placeholder="{{$edittours->description}}">
        </div>
        <button class="btn-success">Save</button>
    </form>


@endsection
