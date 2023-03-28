<?php

namespace App\Providers;

use App\Models\User;

use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(MailchimpNewsletter::class, function () {
            $client = new ApiClient();

            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us13'
            ]);

            return new MailchimpNewsletter(
                $client,
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username === 'TemoGogitidze';
        });
    }
}
