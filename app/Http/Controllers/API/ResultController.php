<?php

namespace App\Http\Controllers\API;

use App\Models\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Result as ResultResource;
use Validator;
class ResultController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();
        return $this->sendResponse(ResultResource::collection($results), 'Results Recived successfully');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $validator = validator::make($input->all() , [
    //         'title' => 'required',
    //         'description' => 'required',
    //         'photo' => 'required|image',
    //     ]);
    //     if($validator->fails()) {

    //         return $this->sendError('validate error', $validator->errors());

    //     }
    //     $post = Post::create($input);
    //     return $this->sendResponse($post, 'Post create successfully');
    // }


    // public function show($id)
    // {
    //     $post = Post::find($id);
    //     if($post->fails()) {

    //         return $this->sendError('validate error');

    //     }
    //     return $this->sendResponse(new PostResource($post), 'Posts retrieved successfully');

    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Post $post)
    // {
    //     //
    // }


    // public function update(Request $request, Post $post)
    // {
    //     $input = $request->all();
    //     $validator = validator::make($input->all() , [
    //         'title' => 'required',
    //         'description' => 'required',
    //         'photo' => 'required|image',
    //     ]);

    //     if($validator->fails()) {

    //         return $this->sendError('validate error');

    //     }

    //     $post->title = $input['title'];
    //     $post->description = $input['description'];
    //     $post->photo = $input['photo'];
    //     $post->save();
    //     return $this->sendResponse(new PostResource($post), 'Posts updated successfully');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Post $post)
    // {
    //     $post->delete();
    //     return $this->sendResponse(new PostResource($post), 'Posts deleted successfully');

    // }
}
