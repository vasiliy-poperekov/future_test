<?php

namespace App\Providers;

use App\Repositories\Contact\ContactRepository;
use App\Repositories\Contact\Daos\CheckIfContactExistsDao;
use App\Repositories\Contact\Daos\ContactCreateDao;
use App\Repositories\Contact\Daos\ContactDeleteDao;
use App\Repositories\Contact\Daos\ContactGetAllDao;
use App\Repositories\Contact\Daos\ContactGetByIdDao;
use App\Repositories\Contact\Daos\ContactUpdateDao;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ContactCreateDao::class, function() {
            return new ContactRepository();
        });

        $this->app->bind(ContactDeleteDao::class, function() {
            return new ContactRepository();
        });

        $this->app->bind(ContactGetAllDao::class, function() {
            return new ContactRepository();
        });

        $this->app->bind(ContactGetByIdDao::class, function() {
            return new ContactRepository();
        });

        $this->app->bind(ContactUpdateDao::class, function() {
            return new ContactRepository();
        });

        $this->app->bind(CheckIfContactExistsDao::class, function() {
            return new ContactRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
