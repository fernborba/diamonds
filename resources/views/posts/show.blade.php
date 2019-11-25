@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-8"><img src="/storage/{{ $post->src }}" alt="" class="w-100"></div>

        <div class="col-4">
            <div>
                <div class="d-flex align-items-center mb-3">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" style="max-width: 40px;" class="rounded-circle w-100">
                    </div>

                    <div>
                        <p class="font-weight-bold ">
                            <a href="/profile/{{ $post->user->profile->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            <a href="#" class="pl-2">Follow</a>
                        </p>

                    </div>
                </div>

                <hr>

                <p class="">
                    <span class="font-weight-bold pr-2">
                        <a href="/profile/{{ $post->user->profile->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>{{ $post->caption }}
                </p>

            </div>
        </div>




    </div>
</div>
@endsection
