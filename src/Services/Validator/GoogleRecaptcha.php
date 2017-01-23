<?php namespace WebEd\Plugins\Captcha\Services\Validator;

use WebEd\Plugins\Captcha\Support\AbstractCaptcha;

class GoogleRecaptcha extends AbstractCaptcha
{
    const VERIFY_SERVER = 'https://www.google.com/recaptcha/api/siteverify';

    /**
     * @var string
     */
    protected $secretKey;

    public function __construct()
    {
        parent::__construct();

        $this->secretKey = get_settings('google_captcha_secret_key');
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $response = $this->getResponse();

        if (!$response) {
            return false;
        }

        try {
            $result = json_decode(file_get_contents(self::VERIFY_SERVER . '?secret=' . $this->secretKey . '&response=' . $response . '&remoteip=' . $this->request->getClientIp()));
            return $result->success;
        } catch (\Exception $exception) {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getResponseKey()
    {
        return 'g-recaptcha-response';
    }
}
