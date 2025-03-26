<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
      public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        Gate::define('destroy-product', function (User $user) {
            return $user->admin === true;  
        });
    }
}
