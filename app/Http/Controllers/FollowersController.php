<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowersController extends Controller
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

    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);

    }
}
