@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <h6 class="panel-title">Editpost</h6>
                    </div>

                    <div class="panel-body">
                        <form method="post" action="{{route('posts.update', $post)  }}">
                            <input type="hidden" name="_method" value="PUT">

                            {{ csrf_field() }}


                            <div class="form-group">

                                <label for="title">edit Title</label>

                                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Enter title" required>

                            </div>

                            <div class="form-group">

                                <label for="body">edit Post</label>

                                <textarea class="form-control" name="body" size="65" placeholder="Enter Body" required="">{{ $post->body }}</textarea>

                            </div>

                            <div class="control">
                                <button type="submit" class="btn btn-primary">Done editing </button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection