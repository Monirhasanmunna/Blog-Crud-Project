<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
       return view('posts.index');
    }

    public function addpost()
    {
       return view('posts.addPost');
    }

    public function store(Request $request)
    {
       // image validation //
    $request->validate([
        'title' => 'required|max:255',
        'details' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
    
        $imageName = '';
        if($request->image){
        $imageName= time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        }
    
        // data store to database //
        $data = new Post;
        $data->title = $request->title;
        $data->details = $request->details;

        if($request->film){
            $data->tag=$request->film;
        }elseif($request->fitness){
            $data->tag = $request->fitness;
        }elseif($request->food){
            $data->tag = $request->food;
        }elseif($request->gadgets){
            $data->tag = $request->gadgets;
        }
        $data->image =$imageName;
        $data->save();
        
        return back()->with('status','Post has been added succesfully');
    }
}
