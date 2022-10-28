<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Services\MailChimpNewsletter;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
            $client = new ApiClient();

            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us14'
            ]);

            return new MailChimpNewsletter($client);
        });
    }

    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        Paginator::useTailwind();
        //Model::unguard();
        Gate::define('admin', function (User $user) {
            return $user->username === 'TommyShelby';
        });
        Blade::if('admin', function () {
            if(!request()->user()){
                return false;
            }
            return request()->user()->can('admin');
        });
    }
}