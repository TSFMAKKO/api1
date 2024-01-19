<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        // 'App\Models\Model'=>'App\Policies\ModelPolicy',
        'App\Models\Post'=>'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        // Sanctum::routes();
        
        Gate::define('view-post',function(User $user, Post $post){
            return $user->id == $post->user_id;
        });

        // Post_policy
        // Gate::authorize('view',function(User $user, Post $post){
        //     return $user->id == $post->user_id;
        // });
    }
}
