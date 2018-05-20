@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        <h6 class="panel-title">EditComment</h6>
                    </div>

                    <div class="panel-body">
                        <form method="post" action="{{ route('comments.update', [$comment->id])  }}">
                            <input type="hidden" name="_method" value="PUT">

                            {{ csrf_field() }}


                            <div class="control">
                                <div class ="form-group">
                                    <textarea name="body" placeholder="Your comment here." class="form-control" required=""></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Done editing </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection