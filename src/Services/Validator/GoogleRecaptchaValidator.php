<?php namespace WebEd\Plugins\Captcha\Services\Validator;

class GoogleRecaptchaValidator extends AbstractCaptchaValidator
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
     * @param string $value
     * @return bool
     */
    public function validate($value)
    {
        if (!$value) {
            return false;
        }

        $params = http_build_query([
            'secret' => $this->secretKey,
            'response' => $value,
            'remoteip' => $this->request->getClientIp(),
        ]);

        $url = self::VERIFY_SERVER . '?' . $params;

        try {
            $arrContextOptions = [
                "ssl" => [
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ],
            ];

            $result = json_decode(file_get_contents($url, false, stream_context_create($arrContextOptions)));
            return $result->success;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
