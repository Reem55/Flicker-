@extends ('layouts.app')

@section('content')
    <a class="btn btn" href="{{ route('posts.create') }}" > make a post </a>

    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <div class="card">
                <div class="card-block">
                    <h2 class="blog-post-title">
                        {{ $post->title }}
                    </h2>
<hr>
                    <p class="blog-post-meta"> {{ $post->created_at->format('Y-m-d') }}<br>
                        <strong> {{ $post->body }} </strong>
                </div>

                <br/>
            </div>
        </div>

        @if(auth()->id() == $post->user_id)

            <a class="btn btn" href="{{ route('posts.edit', $post) }}"> Edit post </a> |
            <a class="btn btn" href="{{ route('posts.destroy', $post) }}"> Delete Post </a>

        @endif




<hr>
            @if(! $post->isLikedByAuth())
                <form action="{{ route('post.vote', $post ) }}" method="POST" , style="float:left">

                    {{ csrf_field() }}

                    <input type="hidden" name="type" value="1">
                    <input class="btn btn-success" type="submit" value="Like">
                </form>
            @endif

            <span style="right">
	 	{{ $post->votes->where('type', 1)->count() != 0 ? $post->votes->where('type', 1)->count() : '' }}
	</span>



            @if(! $post->isDislikedByAuth())
                <form action="{{ route('post.vote', $post) }}" method="POST" , style="float:right";>
                    {{ csrf_field() }}

                    <input type="hidden" name="type" value="-1">
                    <input class="btn btn-danger" type="submit" value="Dislike" ,style="right">
                </form>
            @endif

            <span style="right">
		{{ $post->votes->where('type', -1)->count() != 0 ? $post->votes->where('type', -1)->count() : '' }}
	</span>
        </div>



        <div class="comment">
            <ul class="list-group">

                @foreach ($post->comments as $comment)

                    <li class="list-group-item">
                        {{ $comment->body }}
                        <br/>

                        <strong>
                            {{ $comment->created_at->diffForHumans() }}
                            -
                            {{ $comment->user->name }}
                        </strong>
                        <a class="btn btn-success" href="{{ route('comments.edit',[$comment->id]) }}" > Edit Comment </a>
                        <a class="btn btn-danger" href="{{ route('comments.delete',[$comment->id]) }}"> Delete Comment </a>

                    </li>
                    <br/>
                @endforeach
            </ul>
        </div>

        <br/>

        <div class="card">
            <div class="card-block">
                <form method="POST" action="{{ route('comments.store', [$post->id]) }}">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <textarea name="body" placeholder="Your comment here." class="form-control" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection