<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Workout;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {  
        $this->registerPolicies();

        Gate::define('view-workout', function(User $user, Workout $workout)
        { 

            if ($workout->coach === Auth::user()->id || $workout->athlete === Auth::user()->id)
             return true;
            else 
             return false;


        });

        /*Gate::define('view-workout-athlete', function(Workout $workout)
        {
            return $workout->athlete === Auth::user()->id;
        });
        */
        
    }
}
