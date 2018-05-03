@extends('posts.nav')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <h6 class="panel-title">Add Post</h6>
                    </div>

                    <div class="panel-body">
                        <form method="POST" action="/posts">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter title"required>
                            </div>

                            <div class="form-group">
                                <label for="body">Post</label>
                                <textarea class="form-control" name="body" size="100" placeholder="Enter Body" required=""></textarea>
                            </div>

                            <div class="control">
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>


                        </form>

@endsection
