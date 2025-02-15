<?php

namespace App\Http\Controllers;

use App\Models\User; // Importing the User model
use App\Models\Post; // Importing the User model

use Illuminate\Http\Request; // Importing the Request class
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $post = Post::all();

            $usertype = Auth::user()->usertype; 

            //check user type and redirect the users to there various Dashboard
            if ($usertype == 'user') 
            {
                return view('home.homepage', compact('post'));
            } else if ($usertype == 'admin') 
            {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }


    public function homepage()
    {
        $post = Post::all();
        return view('home.homepage', compact('post'));
    }

    public function post_details($id)
    {
        $post = Post::find($id);
        return view('home.post_details', compact('post'));
    }
}
