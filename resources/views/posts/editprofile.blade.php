@extends('layouts.app')
@section('title','edit page')
@section('content')


    <div style="margin-top: 500px">
        <div class="card">
            <div class="card-body">
                <form action ="{{route('posts.updateprofile', Auth::user()->id)}}" method="post">
                    @csrf
                    @method('PUT')

                    <input class="card-title" type="text" name="name" value="{{ Auth::user()->name}}"><br>
                    <input class="card-title" type="email" name="email" value="{{ Auth::user()->email}}"><br>

                    <button type="submit" class="btn btn-outline-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
