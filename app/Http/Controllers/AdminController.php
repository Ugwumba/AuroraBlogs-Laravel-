<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    //get function to return a view
    public function post_page()
    {
        return view('admin.post_page');
    }

    //function to add post
    public function add_post(Request $request)
    {
        // Ensure user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $user_id = $user->id;
            $name = $user->name;
            $usertype = $user->usertype;

            $post = new Post;

            // if(empty($_POST['title'])) {
            //    echo "Title is required";
            // } else {
            $post->title = $request->title;
            $post->description = $request->description;
            $post->post_status = 'active';
            $post->user_id = $user_id;
            $post->name = $name;
            $post->usertype = $usertype;
            // }

            // Handle image upload if exists
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move('postimage', $imagename);
                $post->image = $imagename;
            }

            $post->save();

            // Redirect back with success message
            return redirect()->back()->with('message', 'Post Added Successfully');
        } else {
            // Redirect or handle unauthenticated user
            return redirect()->route('login'); // Redirect to login page
        }
    }

    public function show_post()
    {
        $post = Post::paginate(2); // Paginate with 2 items per page
        return view('admin.show_post', compact('post'));
    }
    
    public function delete_post($id)
    {
        $post = post::find($id); //find specfic data with the id

        $post->delete();

        return redirect()->back()->with('message', 'Post Deleted Successfully');
    }

    public function edit_page($id)
    {

        $post = post::find($id);

        return view('admin.edit_page', compact('post'));
    }

    public function update_post(Request $request, $id)
    {

        $data = post::find($id);

        $data->title=$request->title;

        $data->description=$request->description;


        $image=$request->image;
        if($image)
        {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('postimage', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
    }

 
}
