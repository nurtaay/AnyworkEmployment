@extends('layouts.app')
@section('title','create page')
@section('content')

    <div class="card" style="width: 500px; margin-left: 500px; margin-top: 200px">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <p class="card-text">{{$post->content}}</p>
            <form style="margin-left: 400px; margin-top: -70px" action ="{{route('posts.favourite',$post->id)}}" method="post">
                @csrf
                <a type="submit"><i class="bi bi-star"></i></a>
            </form>
            <a href="#" class="card-link">
                <form style="margin-top: 30px;" action="{{route('post.resume', $post->id)}}" method="post">
                    @csrf
                    @foreach($resumes as $resume)
                        @if($resume->user->id == Auth::user()->id)
                            <div>{{$resume->profession}}</div>
                            <input type="hidden" name="resume_id" value="{{$resume->id}}">
                            <button class="btn btn-success" type="submit">Save</button>
                        @endif
                    @endforeach
                </form>
                @can('resView', $post, Post::class)
                    <div>
                        <a href="{{route('posts.otklik', $post->id)}}">Отправленные резьюме</a>
                    </div>
                @endcan
            </a>
            <a href="#" class="card-link">
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <textarea name="content" rows="3" placeholder="откликаться"></textarea>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </form>
            </a>
        </div>
    </div>
@endsection

