@extends('layouts.app')
@section('title','createresume PAGE')
@section('content')
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row justify-content-center" style="margin-top: 200px">
        <div class="col-md-10">
            <form action="{{route('resumes.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photoInput" >{{__('messages.Photo')}}</label>
                    <input type="file" class="form-control  @error('photo') is-invalid @enderror" name="photo" id="photoInput" placeholder="{{__('messages.Enter photo url')}}" >

                </div>
                <div class="form-group">
                    <label for="nameInput" >{{__('messages.Name')}}:</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="nameInput" placeholder="{{__('messages.Enter name')}}" >
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="surnameInput" >{{__('messages.Surname')}}:</label>
                    <input type="text" class="form-control  @error('surname') is-invalid @enderror" name="surname" id="surnameInput" placeholder="{{__('messages.Enter surname')}}" >
                    @error('surname')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="emailInput" >{{__('messages.Email')}}</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" id="emailInput" placeholder="{{__('messages.Enter email')}}" >
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="professionInput" >{{__('messages.Profession')}}:</label>
                    <input type="text" class="form-control  @error('profession') is-invalid @enderror" name="profession" id="professionInput" placeholder="{{__('messages.Enter your profession')}}" >
                    @error('profession')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dataInput" >{{__('messages.Date_month_year_of_birth:')}}</label>
                    <input type="date" class="form-control  @error('data') is-invalid @enderror" name="data" id="dataInput" placeholder="{{__('messages.Enter your date:')}}" >
                    @error('data')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="languageInput" >{{__('messages.Language:')}}</label>
                    <input type="text" class="form-control  @error('language') is-invalid @enderror" name="language" id="languageInput" placeholder="{{__('messages.Enter your language:')}}" >
                    @error('language')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="adressInput" >{{__('messages.Adress:')}}</label>
                    <input type="text" class="form-control  @error('adress') is-invalid @enderror" name="adress" id="adressInput" placeholder="{{__('messages.Enter your adress:')}}" >
                    @error('adress')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hobbiInput" >{{__('messages.Hobbies:')}}</label>
                    <input type="text" class="form-control  @error('hobbi') is-invalid @enderror" name="hobbi" id="hobbiInput" placeholder="{{__('messages.Enter your hobbi:')}}" >
                    @error('hobbi')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <button class="btn btn-outline-success" type="submit">{{__('messages.Save post')}}</button>

            </form>
        </div>

    </div>





































</div>



@endsection
