<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use ReCaptcha\ReCaptcha;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));
        $reponse = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
    }
    public function passes($attribute, $value)
    {
        // $recaptcha = new ReCaptcha(env('CAPTCHA_SECRET'));
        // $reponse = $recaptcha->verify($value, $_SERVER['REMOTE_ADDR']);
        // return $reponse->isSuccess();
    }

    public function message()
    {
        return "Phải hoàn thành captcha!";
    }
}
