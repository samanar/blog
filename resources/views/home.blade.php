@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                @if( count($posts) > 0 )
                    @foreach($posts as $post)
                        <div class="post-preview">
                            <a href="{{ route('slug' ,  $post->slug ) }}">
                                <h2 class="post-title">
                                    {{ $post->title }}
                                </h2>
                                <h3 class="post-subtitle">
                                    {{ $post->sub_header }}
                                </h3>
                            </a>
                            <p class="post-meta">Posted by
                                {{ $post->user->name }}
                                {{ $post->created_at->diffForHumans() }}</p>

                            {!! str_limit(strip_tags($post->body) , 150 , '...')   !!}
                        </div>
                        <hr>
                    @endforeach
                @endif
                <div class="text-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <scriipt src="/js/home.js"></scriipt>
@endsection