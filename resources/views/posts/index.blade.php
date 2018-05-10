@extends ('layouts.app')


@section('content')

    <div class="col-sm-8 blog-main">

        <a class="btn btn-success" href="{{ route('posts.create') }}" > create post </a>
        @foreach ($posts as $post)


            <div class="blog-post">

                <h2 class="blog-post-title">
                    <a href="{{ route('posts.show', $post) }}">
                        {{ $post->title }}
                    </a>
                </h2>

                <p class="blog-post-meta"> {{ $post->created_at->format('Y-m-d') }}
                    {{ $post->user->name }}
                </p>


                {{ $post->body }}
            </div>

        @endforeach


    </div>
@endsection