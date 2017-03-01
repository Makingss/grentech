<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function getCaptcha(\Mews\Captcha\Captcha $captcha, $config = 'default')
    {
        return $captcha->create($config);
    }
}
