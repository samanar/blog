@extends('layouts.post_master')

@section('title')
    Laravel Blog | Posts
@endsection

@section('header-background')
    '/img/home-bg.jpg'
@endsection



@section('content')

    @if( Session::has('message') )
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>created at :</th>
                        <th>last update at :</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at->toFormattedDateString() }}</td>
                            <td>{{ $post->updated_at->toFormattedDateString() }}</td>
                            <td>
                                <a href="{{ route('posts.show' , $post->id) }}"
                                   class="btn btn-primary btn-small">View</a>
                                <a href="{{ route('posts.edit' , $post->id) }}"
                                   class="btn btn-success btn-small">Edit</a>
                                <button type="button" class="btn btn-danger btn-small delete"
                                        data-id="{{ $post->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- end of table-responsive -->
        </div> <!-- end of col-sm-10 -->
    </div> <!-- end of row -->

    <div class="text-center">
        {{ $posts->links() }}
    </div>
@endsection

@section('scripts')
    <script src="/js/jquery_confirm.js"></script>
    <script>
        $('document').ready(function () {
            $(".delete").click(function () {
                var data_id = $(this).attr("data-id");
                $.confirm({
                    text: "Are you sure you want to delete post with id:" + data_id + " ?",
                    title: "Confirm delete",
                    confirmButton: "Delete Post",
                    cancelButton: "Cancel",
                    confirmButtonClass: "btn-danger",
                    cancelButtonClass: "btn-warning",
                    dialogClass: "modal-dialog modal-lg",
                    confirm: function () {
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                id: data_id,
                                _method: 'DELETE',
                                _token: "{{ csrf_token() }}"
                            },
                            url: "/posts/" + data_id,
                            complete: function (result, status) {
                                location.reload();
                            }
                        });
                    },
                    cancel: function () {

                    }
                });
            });
        });
    </script>
@endsection