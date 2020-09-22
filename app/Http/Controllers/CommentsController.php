<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
   public function insert(Post $post, Request $request){

       $request['user_id'] = auth()->user()->id;
       $request['post_id'] = $post->id;

       $validatedData = $request->validate([
           'text' => 'required|max:100',
           'user_id' => 'required',
           'post_id' => 'required'
       ]);

       Comment::create($validatedData);

       return Redirect::back();

   }


    public function delete(Comment $comment){

        $this->authorize('delete', $comment);

        $comment->delete();

        return Redirect::back();

    }
}
