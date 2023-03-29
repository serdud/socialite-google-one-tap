<?php

namespace Serdud\SocialiteGoogleOneTap;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class SocialiteGoogleOneTapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $socialite = $this->app->make(Factory::class);

        $socialite->extend(
            'google-one-tap',
            fn() => $socialite->buildProvider(SocialiteGoogleOneTap::class, config('services.google')),
        );
    }
}
