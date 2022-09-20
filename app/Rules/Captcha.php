<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use ReCaptcha\ReCaptcha;

class Captcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET')); // tao class Captcha
        $response = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']); // ktra
        return $response->isSuccess(); // tra ve neu thanh cong
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Có vấn đề về mã Captcha';
    }
}
