<?php

declare(strict_types=1);

namespace Pwf\LaravelPay\Facades;

use Illuminate\Support\Facades\Facade;

class PwfPay extends Facade
{
    /**
     * Return the facade accessor.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'pwfpay';
    }
}