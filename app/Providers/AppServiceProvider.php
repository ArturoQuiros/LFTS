<?php

namespace App\Providers;

use App\Services\Newsletter;
use MailchimpMarketing\ApiClient;
use Illuminate\Pagination\Paginator;
use App\Services\MailChimpNewsletter;
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
    }
}