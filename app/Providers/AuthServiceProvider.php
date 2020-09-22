<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       /* Gate::define('modificare-autore', function(User $user, Post $post){
                return $post->user->is($user);
        });

        Gate::define('eliminarecommento', function(User $user, Comment $comment){
            return $comment->user->is($user);
        });*/


        Gate::before(function ($user, $permission){
            if ($user->permissions()->contains($permission)) {
                return true;
            }
        });
    }
}
