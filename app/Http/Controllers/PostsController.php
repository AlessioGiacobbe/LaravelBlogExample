<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\PostCreated;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostsController extends Controller
{
    public function home(){
        return \view('home', [
            'posts' => Post::all()->sortByDesc('posted_at'),
        ]);
    }

    public function view(Post $post){
        return \view('selezionato', [
            'post' => $post,
            'utenti' => User::all(),
            'commenti' => $post->commenti
        ]);
    }

    public function insert(Request $request){

        $request['user_id'] = auth()->user()->id;

        $validatedData = $request->validate([
            'text' => 'required|max:100',
            'user_id' => 'required'
        ]);

        $postpostato = Post::create($validatedData);

        auth()->user()->notify(new PostCreated($postpostato));

        return Redirect::back();
    }

    public function update(Request $request, Post $post){

        $this->authorize('update', $post);

        $validatedData = $request->validate([
            'user_id' => 'required'
        ]);

        $post->update($validatedData);

        return Redirect::back();
    }


}
