@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <h1>Users</h1>

    <table class="table" style="margin-top: 250px">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">User</th>
            <th scope="col">Week</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
            @for($i=0; $i<count($cart); $i++)
                <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$cart[$i]->shop->name}}</td>
                    <td>{{$cart[$i]->user->name}}</td>
                    <td>{{$cart[$i]->week}}</td>
                    <td>{{$cart[$i]->status}}</td>
                    <td>
                        <form action="{{route('cart.confirm', $cart[$i]->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success" type="submit">Confirm</button>
                        </form>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
@endsection
