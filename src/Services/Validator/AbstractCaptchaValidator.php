<?php namespace WebEd\Plugins\Captcha\Services\Validator;

abstract class AbstractCaptchaValidator
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    public function __construct()
    {
        $this->request = request();
    }

    /**
     * @var string $value
     * @return bool
     */
    abstract public function validate($value);
}
