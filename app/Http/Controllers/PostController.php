<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
       $i=1;
       $post = Post::latest()->paginate(3);
       return view('posts.index',compact('post','i'))->with('i',(request()->input('page',1)-1)*3);
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

    public function show($id)
    {
        $post=Post::where('id',$id)->first();
        return view('posts.show',compact('post'));
    }

    public function edit($id)
    {
        $editpost = Post::where('id',$id)->first();
        return view('posts.edit',compact('editpost'));
    }

    public function update(Request $request, $id)
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
        $data = Post::where('id',$id)->first();
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
        
        return back()->with('status','Post has been Update succesfully');
    }


    public function delete($id)
    {
        Post::where('id',$id)->delete();
        return back()->with('status','Post has been Update succesfully');

    }
}
