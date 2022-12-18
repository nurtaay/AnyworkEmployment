@extends('layouts.app')
@section('title', 'MAIN  PAGE')
@section('content')
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>hack!</h2>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="row">
                        <br>
                        @foreach($tindex as $post)
                            <div class="col-sm-4">
                                <div class="card" >
                                    <div class="card-body">
                                        <div class="card-header">
                                            <img  src="{{asset($post->image)}}" alt="">
                                            <h5 class="card-title">{{$post->name}} </h5></div>
                                            <p class="card-text">{{$post->content}}</p>
                                            <button href="#" class="btn btn-success" type="submit">Read More</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
