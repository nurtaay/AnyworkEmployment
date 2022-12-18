@extends('layouts.app')
@section('title','create page')
@section('content')

    <div class="card" style="width: 500px; margin-left: 500px; margin-top: 200px; height: 300px ">
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
                    <textarea name="content" rows="3" placeholder="Comment"></textarea>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <button type="submit" class="btn btn-outline-success">Save</button>
                </form>
            </a>
        </div>
    </div>
    <ul class="list-group mt-3">
        @foreach($post->comments as $comment)
            <li class="list-group-item d-flex justify-content-between align-items-start" style="width: 700px; margin-top: 5px">
                <small>Auhtor: <span style="color: #1a202c; font-size: 16px;">{{$comment->user->name}}</span></small>
                <small style="margin-right: 300px"><span style="color: #1a202c; font-size: 16px;">Comment: {{$comment->content}}</span></small>
            </li>
            @can('delete', $comment)
                <form action="{{route('comments.destroy', $comment->id)}}" method="post" style="margin-top: -50px; margin-left: 728px">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  onclick="return confirm('Are you sure?')" class="btn btn-outline-dark">X</button>
                </form>
            @endcan
        @endforeach
    </ul>
@endsection

