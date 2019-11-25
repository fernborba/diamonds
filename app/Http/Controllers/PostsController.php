<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //
    public function __construct()
    {

        /*
         * Middleware provide a convenient mechanism for filtering HTTP requests entering your application.
         * For example, Laravel includes a middleware that verifies the user of your application is authenticated.
         * If the user is not authenticated, the middleware will redirect the user to the login screen. However,
         * if the user is authenticated, the middleware will allow the request to proceed further into the application.
         * */
        // All the single routes in the controller will required authorization.
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }


    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'src' => ['required', 'image'],
        ]);

        $imagePath = request('src')->store('uploads','public');

        //resize the image
        $img = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $img->save();


        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'src' => $imagePath,
        ]);


        return redirect('/profile/' . auth()->user()->id);
    }

    //This \App\Post in Route autobinding with the Model Post. Its not even necessary find $post
    public function show(\App\Post $post)
    {
        return view('posts.show', compact('post'));

    }
}
