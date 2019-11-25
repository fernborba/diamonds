@extends('layouts.app')

@section('content')
<div class="container">

    @foreach($posts as $post)

        <div class="row">

            <div class="col-6 offset-3">
                <a href="/profile/{{ $post->user->id }}"><img src="/storage/{{ $post->src }}" alt="" class="w-100"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 offset-3  pb-5">
                <div>

                    <span class="font-weight-bold pr-2">
                        <a href="/profile/{{ $post->user->profile->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>{{ $post->caption }}

                </div>
            </div>

        </div>

    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">{{ $posts->links() }}</div>
    </div>
</div>
@endsection
