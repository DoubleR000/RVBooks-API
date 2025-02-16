<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Loan;
use App\Policies\AuthorPolicy;
use App\Policies\LoanPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Super-Admin')) {
                return true;
            }
        });

        Gate::policy(Author::class, AuthorPolicy::class);
        Gate::policy(Loan::class, LoanPolicy::class);
    }
}
