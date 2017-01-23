<?php

if (!function_exists('google_recaptcha')) {
    /**
     * @return \WebEd\Plugins\Captcha\Support\GoogleRecaptcha
     */
    function google_recaptcha()
    {
        return \WebEd\Plugins\Captcha\Facades\GoogleRecaptchaFacade::getFacadeRoot();
    }
}