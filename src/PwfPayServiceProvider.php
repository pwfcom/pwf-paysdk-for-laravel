<?php

declare(strict_types=1);

namespace Pwf\LaravelPay;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Pwf\PaySDK\Base\ApiClient;

class PwfPayServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public function boot()
    {
        if ($this->app instanceof Application && $this->app->runningInConsole()) {
            $this->publishes([
                dirname(__DIR__).'/config/pwfpay.php' => config_path('pwfpay.php'), ],
                'pwf-pay'
            );
        }

        if ($this->app instanceof LumenApplication) {
            $this->app->configure('pwfpay');
        }
    }


    public function register()
    {
        $this->mergeConfigFrom(dirname(__DIR__).'/config/pwfpay.php', 'pwfpay');

        $apiClient = ApiClient::setOptions(config('pwfpay'));

        $this->app->singleton('pwfpay', function () use ($apiClient) {
            return $apiClient;
        });

    }


    public function provides()
    {
        return ['pwfpay'];
    }
}