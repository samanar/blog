@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}"
                              role="form"
                              data-toggle="validator"
                              accept-charset="UTF-8">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Name</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ old('name') }}" required autofocus
                                           data-error="Name Field is required">
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required
                                           data-error="Email Field is required && should be valid !">
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 control-label">Password</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control" name="password" required
                                           data-error="Password is required">
                                    <div class="help-block with-errors"></div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>
                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required
                                           data-match="#password">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/validator.min.js"></script>
    <script>
        $('#create_post_form').validator();
    </script>
@endsection
