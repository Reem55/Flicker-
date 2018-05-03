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
                </div>

                <br/>
            </div>
        </div>


@endsection


