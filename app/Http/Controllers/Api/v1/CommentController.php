<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['comments' => Comment::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        
        if (! $comment->save())
            return response()->json([
                'message' => 'error'
            ]);
        return response()->json([
            'message' => 'success',
            'comment' => $comment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        if (! $comment)
            return response()->json(['error' => 'Not found'], 404);
        
        return response()->json(['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        if (! $comment)
            return response()->json(['error' => 'Not found'], 404);

        $comment->name = $request->name;
        $comment->comment = $request->comment;
        
        if (! $comment->update())
            return response()->json([
                'message' => 'error'
            ]);
        return response()->json([
            'message' => 'success',
            'comment' => $comment
        ]);
        
        return response()->json(['comment' => $comment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (! $comment)
            return response()->json(['error' => 'Not found'], 400);
        
        $comment->delete();
        return response()->json([
            'Message' => 'Success',
            'Deleted' => $comment
        ], 200);
    }
}
