<?php namespace WebEd\Plugins\Captcha\Facades;

use Illuminate\Support\Facades\Facade;
use WebEd\Plugins\Captcha\Support\GoogleRecaptchaRenderer;

class GoogleRecaptchaFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GoogleRecaptchaRenderer::class;
    }
}
