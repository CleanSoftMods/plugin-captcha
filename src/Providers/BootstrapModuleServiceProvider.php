<?php namespace WebEd\Plugins\Captcha\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapModuleServiceProvider extends ServiceProvider
{
    protected $module = 'WebEd\Plugins\Captcha';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->booted(function () {
            $this->booted();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

    private function booted()
    {
        cms_settings()
            ->addGroup('captcha', 'Captcha')
            ->addSettingField('google_captcha_site_key', [
                'group' => 'captcha',
                'type' => 'text',
                'priority' => 1,
                'label' => 'Google captcha site key',
                'helper' => 'Use this in the HTML code your site serves to users'
            ], function () {
                return [
                    'google_captcha_site_key',
                    get_settings('google_captcha_site_key'),
                    ['class' => 'form-control']
                ];
            })
            ->addSettingField('google_captcha_secret_key', [
                'group' => 'captcha',
                'type' => 'text',
                'priority' => 1,
                'label' => 'Google captcha secret key',
                'helper' => 'Use this for communication between your site and Google. Be sure to keep it a secret'
            ], function () {
                return [
                    'google_captcha_secret_key',
                    get_settings('google_captcha_secret_key'),
                    ['class' => 'form-control']
                ];
            });
    }
}
