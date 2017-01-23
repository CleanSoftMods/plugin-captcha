<?php namespace WebEd\Plugins\Captcha\Support;

abstract class AbstractCaptcha
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
     * @return string
     */
    abstract public function getResponseKey();

    /**
     * @return string|mixed
     */
    public function getResponse()
    {
        return $this->request->get($this->getResponseKey());
    }

    /**
     * @return bool
     */
    abstract public function validate();
}
