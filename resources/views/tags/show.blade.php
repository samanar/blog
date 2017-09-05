@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <h1>{{ $tag->name }} tag
                <small>{{ $tag->posts()->count() }} posts</small>
            </h1>
        </div>
    </div>

    <hr>

    <div class="table-responsive col-sm-8 col-sm-offset-2">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>title</th>
                <th>tags</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tag->posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        @foreach ($post->tags() as $tag)
                            <span class="label label-default"></span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('posts.show' , $post->id) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection