@if( $errors->any() )
    <div class="form-group">
        @foreach ( $errors->all() as $error )
            <div class="alert alert-danger"><i class="fa fa-exclamation" aria-hidden="true"></i>
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif