<?php

if (!function_exists('google_recaptcha')) {
    /**
     * @return \WebEd\Plugins\Captcha\Support\GoogleRecaptchaRenderer
     */
    function google_recaptcha()
    {
        return \WebEd\Plugins\Captcha\Facades\GoogleRecaptchaFacade::getFacadeRoot();
    }
}