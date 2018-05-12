@extends('layouts.app')
@section('content')


    <div class="col-sm-8 blog-main">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                <div class="card">
                    <div class="card-block">
                        <h2 class="blog-post-title">
                            <a href="posts/{{ $post->id }}">
                                {{ $post->title }}
                            </a>
                        </h2>

                        <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString()  }}<br>
                        {{ $post->body }}
                    </div>


                </div>
            </div>

            <a class="btn btn" href="{{ route('posts.edit', $post) }}"> Edit post </a> |
            <a class="btn btn" href="{{ route('posts.destroy', $post) }}"> Delete Post </a>

            <div style="width:100%">

                <div class="comment">
                    <ul class="list-group">

                        @foreach ($post->comments as $comment)

                            <li class="list-group-item">
                                {{ $comment->body }}
                                <br/>

                                <a class="btn btn" href="{{ route('comments.edit',[$comment->id]) }}" > Edit Comment </a>
                                <a class="btn btn" href="{{ route('comments.delete',[$comment->id]) }}"> Delete Comment </a>

                            </li>

                        @endforeach
                    </ul>
                </div>

                <hr>

                <div class="card">
                    <div class="card-block">
                        <form method="POST" action="{{ route('comments.store', [$post->id]) }}">

                            {{ csrf_field() }}


                            <div class="form-group">
                                <textarea name="body" placeholder="Make a comment." class="form-control" required=""></textarea>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
@endsection