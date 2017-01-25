<?php

if (!function_exists('google_recaptcha')) {
    /**
     * @return \WebEd\Plugins\Captcha\Support\Renderer\GoogleRecaptchaRenderer
     */
    function google_recaptcha()
    {
        return \WebEd\Plugins\Captcha\Facades\GoogleRecaptchaFacade::getFacadeRoot();
    }
}