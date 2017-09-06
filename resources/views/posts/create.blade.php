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
            <h1>Create Post</h1>
            <p>fill the form below in order to create form </p>
        </div>


        <form action="{{ route('posts.store') }}" method="POST" id="create_post_form" role="form"
              data-toggle="validator"
              accept-charset="UTF-8">
            {{ csrf_field() }}

            @include("layouts.errors")

            <div class="form-group">
                <label for="title" class="control-label">Title :</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title"
                       maxlength="255" required>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
                <label for="sub_header" class="control-label">Sub Header :</label>
                <input type="text" name="sub_header" id="sub_header" class="form-control"
                       placeholder="Enter Sub Header">
            </div>

            <div class="form-group">
                <label for="tag" class="control-label">Tag :</label>
                <select name="tags[]" class="form-control" id="tag" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_id" class="control-label">Category :</label>
                <select name="category_id" class="form-control" id="category_id">
                    <option value="" selected="selected">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body" class="control-label">body : </label>
                <textarea name="body" id="body" class="form-control" placeholder="Enter Body"
                          data-error="body is required" required></textarea>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-success btn-block" value="Create Post">
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
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
        };
        CKEDITOR.replace('body' , options);
        $('#create_post_form').validator();
        $("#tag").select2();
    </script>
@endsection