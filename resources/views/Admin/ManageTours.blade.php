@extends('layouts.master')

@section('content')


    <table class="table">
        <thead>
        <tr scope="col">
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Period</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>De-active</th>
        </tr>
        </thead>
        <tbody>
        @foreach($gettours as $item)
        <tr scope="row">
            <th>{{ $item->id }}</th>
            <td>{{ $item->tourname }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->period }}</td>
        <td><img src="{{ $item->cover }}" style="width: 50px;height: 50px"></td>
        <td>
            <form method="post" action="/admin/tour/edit/{{$item->id}}">
                @csrf
                <button class="btn-info">Edit</button>
            </form>
        </td>
        <td>
            <form method="post" action="/admin/tour/delete/{{$item->id}}">
                @csrf
                <button class="btn-danger">Delete</button>
            </form>
        </td>
        <td>
                @if($item->is_active == 0)
                <form method="post" action="/admin/tour/active/{{$item->id}}">
                    @csrf
                    <button class="btn-warning">
                       Be Active
                    </button>
                </form>
                @else
                <form method="post" action="/admin/tour/deactive/{{$item->id}}">
                            @csrf
                    <button class="btn-success">
                        Be DeActive
                    </button>
                @endif
                </form>
        </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
    {{ $gettours->links() }}
    </div>
@endsection

