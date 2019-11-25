@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row"><div class="h1">Add new post</div></div>
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Post Caption') }}</label>


                    <input id="caption" type="text"
                           class="form-control @error('caption') is-invalid @enderror"
                           name="caption" value="{{ old('caption') }}"
                           autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                   </span>
                    @enderror

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <label for="src" class="col-md-4 col-form-label">{{ __('Image file') }}</label>

                <input type="file" class="form-control-file" id="image" name="src">


                @error('src')
                <strong>{{ $message }}</strong>
                @enderror

            </div>
        </div>

        <div class="row pt-3">
            <div class="col-8 offset-2">
                <button class="btn btn-primary p-1">Save post</button>
            </div>
        </div>

    </form>

</div>
@endsection
