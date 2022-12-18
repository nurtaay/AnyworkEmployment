@extends('layouts.adm')

@section('title', 'MAIN  PAGE')

@section('content')
    <div class="container" style="margin-left: 7rem; margin-top: 250px">
        <a href="{{route('adm.tournoments.create')}}" class="btn btn-outline-success">Add</a>
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                 <th>Content</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tours as $tr)
                <tr>
                    <td>
                        {{$tr->name}}
                    </td><td>
                        {{$tr->content}}
                    </td>
                    <td>
                        <form action="{{route('adm.tournoments.destroy',$tr->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
            </tbody>
        </table>
    </div>
@endsection





