<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {
        $user=Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $usertype;

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }
        
        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');
    }

    public function show_post()
    {
        $post = Post::all();
        return view('admin.show_post', compact('post'));
    }

    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back('message', 'Post Deleted Successfully');
    }

    public function edit_post($id)
    {
        $post=Post::find($id);

        return view('admin.edit_post', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;            
        }
        $data->save();
        return redirect()->back();
    }

    public function accept_post($id)
    {
        $post = Post::find($id);
        $post->post_status = 'active';
        $post->save();
        return redirect()->back()->with('message', 'Post status changed to active');
    }

    public function reject_post($id)
    {
        $post = Post::find($id);
        $post->post_status = 'rejected';
        $post->save();
        return redirect()->back()->with('message', 'Post status changed to rejected');
    }
}
