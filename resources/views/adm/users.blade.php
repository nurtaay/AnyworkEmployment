@extends('layouts.adm')
@section('title','users page')
@section('content')

    <form action="{{route('adm.users.search')}}" method="GET">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">@</span>
            </div>
            <input type="text" name="search" class="form-control" placeholder="{{__('messages.Search')}}" aria-label="Username" aria-describedby="basic-addon1">
            <button class="btn btn-success" type="submit">{{__('messages.Search')}}</button></div>

    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Name')}}</th>
            <th scope="col">{{__('messages.Email')}}</th>
            <th scope="col">{{__('messages.Role')}}</th>
            <th scope="col">{{__('messages.ban/unban')}}</th>
            <th scope="col">{{__('messages.edit_role')}}</th>
        </tr>
        </thead>
        <tbody>
        @for($i=0;$i<count($users);$i++)
            <tr>
                <th scope="row">{{$i+1}}</th>
                <td>{{$users[$i]->name}}</td>
                <td>{{$users[$i]->email}}</td>
                <td>{{$users[$i]->role->name}}</td>
                <td>
                    <form action="
                        @if($users[$i]->is_active)
                        {{route('adm.users.ban',$users[$i]->id)}}
                        @else
                        {{route('adm.users.unban',$users[$i]->id)}}
                        @endif
                        " method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn {{$users[$i]->is_active ? 'btn-danger':'btn-success'}}" type="submit">
                            @if($users[$i]->is_active)
                            {{__('messages.Ban')}}
                            @else
                            {{__('messages.Unban')}}
                            @endif

                        </button>
                    </form>
                </td>
                <td><form action="{{route('adm.users.update',$users[$i]->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <select name="role_id">
                                @foreach($roles as $role)
                                    <option
                                        @if( $role->id == $users[$i]->role_id ) selected
                                        @endif value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit">OK</button>
                        </div>
                    </form></td>
            </tr>
        @endfor

        </tbody>
    </table>
@endsection
