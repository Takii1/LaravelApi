<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Posts::all();
        return  response()->json(['Posts' => Posts::all()], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Posts;
        $post->Title = $request->Title;
        $post->description = $request->description;
        if($post->save()){
            return response()->json(['Post added Sucessfully'], 200);
        }else{
            return response()->json(['an error occured try again'], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        return response()->json(['post',posts::find($posts)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        $post = Posts::find($posts);
        if($post -> delete()){
            return response()->json('Post has Deleted', 200, 'Sucessfully');
        }else{
            return response()->json('Error try again later', 401, 'task failed');
        }
    }
}
