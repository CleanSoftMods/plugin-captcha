<?php namespace WebEd\Plugins\Captcha\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use WebEd\Plugins\Captcha\Services\Validator\GoogleRecaptchaValidator;

class ValidateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('google_recaptcha', function ($attribute, $value, $parameters, $validator) {
            /**
             * @var GoogleRecaptchaValidator $captcha
             */
            $captcha = app(GoogleRecaptchaValidator::class);

            return $captcha->validate($value);
        }, 'Please ensure that you are not a robot!');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
