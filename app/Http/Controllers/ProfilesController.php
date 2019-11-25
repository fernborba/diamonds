<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;



class ProfilesController extends Controller
{




    /**
     * Show the profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(User $user)
    {



        if (auth()->user()){
            $follows = auth()->user()->following->contains($user->id);
        } else {
            $follows = false;
        }


        $postcount = Cache::remember('$postcount'.$user->id, now()->addSeconds(60), function () use ($user){
            return $user->posts->count();
        });


        $followercount = Cache::remember('followercount'.$user->id, now()->addSeconds(60), function () use ($user){
            return  $user->profile->followers->count();
        });


        $followingcount = Cache::remember('followingcount'.$user->id, now()->addSeconds(60), function () use ($user){
            return $user->following->count();
        });

        return view('profiles.index', compact('user','follows','postcount', 'followercount','followingcount'));

    }

    /**
     * Edit the profile
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => ['url'],
            'src' => ['image']
        ]);

        $dataUpdate = ([
            'title' => $data['title'],
            'description' =>  $data['description'],
            'url' =>  $data['url'],
        ]);


        if (request('src'))
        {
            $imagePath = request('src')->store('uploads','public');

            //resize the image
            $img = Image::make(public_path("storage/{$imagePath}"))->fit(150, 150);
            $img->save();

            $dataUpdate['src'] = $imagePath;
        }


        auth()->user()->profile()->update($dataUpdate);

        return redirect("/profile/{$user->id}");
    }


}
