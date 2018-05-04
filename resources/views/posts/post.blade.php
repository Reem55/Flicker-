@extends('layouts.app')
@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <div class="card">
                <div class="card-block">
                    <h2 class="blog-post-title">
                        {{ $post->title }}
                    </h2>



                    <p class="blog-post-meta"> {{ $post->created_at->format('Y-m-d') }}<br>
                        <strong> {{ $post->body }} </strong>



                    <div class="card">
                        <div class="card-block">
                            <form method="POST" action="{{ route('comments.store', [$post->id]) }}">
                                {{ method_field('PATCH') }}

                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="body">comment</label>
                                        <textarea class="form-control" name="body" size="100" placeholder="Your comment" ></textarea>
                                    </div>
                                <div class="control">
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                </div>

                        </div>

                        <br/>
                    </div>
                </div>



                        </div>
                    </div>
                </div>





@endsection


