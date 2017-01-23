<?php namespace WebEd\Plugins\Captcha\Support;

class GoogleRecaptchaRenderer
{
    /**
     * @var array
     */
    protected $forms = [];

    /**
     * @var string
     */
    protected $siteKey;

    /**
     * @var string
     */
    protected $secretKey;

    protected $language = 'en';

    public function __construct()
    {
        $this->siteKey = get_settings('google_captcha_site_key');

        $this->secretKey = get_settings('google_captcha_secret_key');
    }

    public function setLanguage($languageCode)
    {
        $this->language = $languageCode;

        return $this;
    }

    /**
     * @param $elementId
     * @param array $options
     * @return $this
     */
    public function registerForm($elementId, array $options = [])
    {
        $options = array_merge([
            'theme' => 'light',
        ], $options);
        $this->forms[$elementId] = $options;

        return $this;
    }

    /**
     * @param $elementId
     * @return $this
     */
    public function removeForm($elementId)
    {
        if (isset($this->forms[$elementId])) {
            unset($this->forms[$elementId]);
        }

        return $this;
    }

    /**
     * @param null $hookName
     * @param array $params
     * @return string|null
     */
    public function renderScript($hookName = null)
    {
        $view = view('webed-captcha::google-captcha.script-callback', [
            'forms' => $this->forms,
            'siteKey' => $this->siteKey,
            'language' => $this->language
        ])->render();

        if (!$hookName) {
            return $view;
        }

        return add_action($hookName, function () use ($view) {
            echo $view;
        }, 999);
    }
}
