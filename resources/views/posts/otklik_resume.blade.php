@extends('layouts.app')
@section('title','otklik page')
@section('content')


    @foreach($resume as $r)
        <div class="card" style="width: 18rem; margin-top: 200px">
            <img src="{{$r->photo}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$r->name}}</h5>
                <p class="card-text">{{$r->surname}}</p>
                <p class="card-text">{{$r->email}}</p>
                <p class="card-text">{{$r->profession}}</p>
                <p class="card-text">{{$r->data}}</p>
                <p class="card-text">{{$r->language}}</p>
                <p class="card-text">{{$r->adress}}</p>
                <p class="card-text">{{$r->hobbi}}</p>
            </div>
    @endforeach

@endsection
