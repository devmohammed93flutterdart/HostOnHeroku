<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Http\Resources\Post as PostResource;
use App\Http\Controllers\API\BaseController as BaseController;
class PostController extends BaseController
{

    public function indexApi()
    {
        $posts = Post::all();
        return $this->sendResponse(PostResource::collection($posts));
    }

    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    public function postsTrashed() {

        $trashed = Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts', $trashed);

    }
   
    public function create()
    {
        return view('posts.create');
    }



    public function store(Request $request)
    {

        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
        ]);

        $photo = $request->photo;
        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts', $newPhoto);

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'photo' => 'uploads/posts/'.$newPhoto,
            'slug' => str_slug($request->title),
        ]);

        return redirect()->back(); 

    }

   
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('post.show')->with('post', $post);
    }

  
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

   
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if( $request->has('photo') ) {
            $photo = $request->photo;
            $newPhoto = time().$photo->getClientOriginalName();
            $photo->move('uploads/posts', $newPhoto);

            $post->photo = 'uploads/posts/'. $newPhoto;

            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();

            return redirect()->back(); 
        }

    }

    
    public function destroy($id)
    {

        $post = Post::where('id', $id)->where('user_id', Auth::id())->first();
        if($post === null) {
            return redirect()->back(); 
        }
        $post = Post::find($id);

        $post->delete();
        
        return redirect()->back(); 

    }

    
    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id' ,$id)->first();

        $post->forceDelete();

        return redirect()->back(); 

    }

    
    public function restore($id)
    {
        $post = Post::withTrashed()->where('id' , $id)->first();
        $post->restore();

        return redirect()->back(); 

    }
}
