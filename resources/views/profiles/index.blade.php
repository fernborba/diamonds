@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pt-3">

            <img src="{{ $user->profile->profileImage() }}" style="height: 150px" class="rounded-circle " />
        </div>

        <div class="col-9 pt-3" >
            <div class="d-flex align-items-center">
                <div><h1>{{ $user->username }}</h1></div>

                @can('update', $user->profile)
                    <div class="ml-5"><button onclick="location.href='/p/create'" class="btn btn-primary">Add new post</button></div>
                @endcan


                @cannot('update', $user->profile)
                    <follow-button userid="{{ $user->id }}" follows="{{ $follows }}" @followed="followed()" @unfollowed="unfollowed()"></follow-button>

                @endcannot

                @can('update', $user->profile)
                    <div class="ml-5"><a href="/profile/{{ $user->id }}/edit">Edit profile</a></div>
                @endcan

            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postcount  }} </strong> posts</div>
                <div class="pr-5"><followers-info count="{{ $followercount }}"></followers-info></div>
                <div class="pr-5"><strong>{{ $followingcount }}</strong> following</div>
            </div>
            <div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
            <div class="pt-3">{{ $user->profile->description }}</div>
            <div class="font-weight-bold"><a href="#">{{ $user->profile->url }}</a> </div>

        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4"><a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->src }}" class="w-100"/></a></div>

        @endforeach

    </div>
</div>
@endsection
