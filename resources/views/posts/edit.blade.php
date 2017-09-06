@extends ('layouts.post_master')

@section('title')
    Laravel Blog | create new post
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Edit your post </h1>
            <p>you can use the form below in order to edit your post </p>
        </div>


        <form action="{{ route('posts.update' , $post->id) }}" method="POST" id="create_post_form" role="form"
              data-toggle="validator"
              accept-charset="UTF-8">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include("layouts.errors")

            <div class="form-group">
                <label for="title" class="control-label">Title :</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title"
                       maxlength="255" data-error="Title is required" required
                       value="{{ $post->title }}">
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="sub_header" class="control-label">Sub Header :</label>
                <input type="text" name="sub_header" id="sub_header" class="form-control" placeholder="Enter Sub Header"
                       value="{{ $post->sub_header }}">
            </div>

            <div class="form-group">
                <label for="tag" class="control-label">Tag : </label>
                <select name="tags[]" id="tag" class="form-control" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="category" class="control-label">Category :</label>
                <select name="category" class="form-control">
                    <option value="null"
                            @if($post->category_id == null || $post->category_id == "")
                            selected="selected"
                            @endif
                    >
                        Select a category
                    </option>
                    @foreach( $categories as $category )
                        <option value="{{ $category->id }}"
                                @if ( $category->id == $post->category_id )
                                selected="selected"
                                @endif
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body" class="control-label">body : </label>
                <textarea name="body" id="body" class="form-control" placeholder="Enter Body"
                          data-error="body is required" required>
                    {!! $post->body !!}
                </textarea>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="submit" class="btn btn-success btn-block" value="Edit">
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('posts.show' , $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script src="/js/validator.min.js"></script>
    <script src="/js/select2.min.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
        CKEDITOR.replace('body' , options);
        $('#create_post_form').validator();
        $("#tag").select2();
        $("#tag").val({{ json_encode($post->tags()->allRelatedIds()->toArray()) }}).trigger("change");
    </script>
@endsection