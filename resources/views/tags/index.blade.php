@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 pull-right">
                <button class="btn btn-primary btn-xs btn-block" data-toggle="modal" data-target="#myModal">Create Tag
                </button>
            </div>
            <div class="col-sm-2 pull-right"></div>
        </div>
    </div>
    <div class="table-responsive col-sm-8 col-sm-offset-2"
         style="margin-top: 30px;margin-bottom: 30px;clear: both;">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>created_At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->created_at->toDayDateTimeString() }}</td>
                    <td>
                        <a href="{{ route('tags.show' , $tag->id) }}" class="btn btn-success btn-small">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create New Tag</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('tags.store') }}">
                        {{ csrf_field() }}
                        <div class="form-container">
                            <label for="name" class="control-label">Name : </label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        </div>

                        <input type="submit" style="display: none;" name="submit" id="create_tag">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="model_save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $("document").ready(function () {
            $("#model_save").click(function () {
                var name = $("#name").val();
                if (name == "" || typeof name === "undefined" || name == null) {
                    alert("name field can not be empty");
                } else {
                    $("#create_tag").click();
                }
            });
        });
    </script>
@endsection