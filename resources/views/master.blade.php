@extends('layouts.app')
@section('content')

    <a class="btn btn-success" href="{{ route('posts.create') }}" > make a post </a>



    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach ($posts as $post)

                @include('posts.post')

            @endforeach


        </div>
    </div>
</div>
@endsection
