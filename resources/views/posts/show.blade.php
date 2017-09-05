@extends('layouts.post_master')

@section('post_heading')
    {{ $post->title }}
@endsection

@section('post_subheading')
    {{ $post->sub_header }}
@endsection

@section('meta')
    posted by {{ $post->user->name }} on {{ $post->created_at->toFormattedDateString() }}
@endsection
@section('content')

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    @foreach ($post->tags as $tag)
                      <span class="label label-default">{{ $tag->name }}</span>
                    @endforeach
                    <br><br>
                    @if( $post->category_id != null )
                        Category : {{ $post->category->name }}
                        <br>
                    @endif
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </article>
@endsection