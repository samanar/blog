@extends('layouts.post_master')

@section('title' , 'Categories')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <button class="btn btn-info btn-block" data-toggle="modal" data-target="#add_category_modal">Create New
                Category
            </button>
        </div>
    </div>

    @include("layouts.errors")

    <div class="table-responsive margin_top_20 col-sm-8 col-sm-offset-2">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $categories as $category )
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->toDayDateTimeString() }}</td>
                    <td>
                        <button class="btn btn-danger btn-small delete_category" data-id="{{ $category->id }}">Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



    {{--create category modal--}}

    <div class="modal fade bs-example-modal-lg" id="add_category_modal" tabindex="-1" role="dialog"
         aria-labelledby="add_category_modal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Category</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form method="POST" action="{{ route('categories.store') }}">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name">Name : </label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <input type="submit" style="display: none" id="add_category_submit">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" id="create_category_medal_submit" class="btn btn-success">Create</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $("#create_category_medal_submit").click(function () {
                var name = $("#name").val();
                if (name == "" || typeof name === "undefined") {
                    alert("You should fill the name field for creating new category");
                } else {
                    $("#add_category_submit").click();
                }
            });

            $(".delete_category").click(function () {
                var data_id = $(this).attr("data-id");

                var data = {
                    _token: "{{csrf_token()}}",
                    id: data_id
                };
                $.post('/categories/delete/' + data_id, data, function () {
                    location.reload();
                });
            });
        });
    </script>
@endsection