@extends('layouts.master')

@section('content')
@foreach($stour as $item)

    {{ $item }}

@endforeach
    <form method="get" action=" {{ url('sam') }} ">
        <input name="email" type="email">
        <button>click</button>
    </form>
@endsection
