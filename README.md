## 依赖

- php >= 7.3 (v3.1.0 开始 >=7.4.0)
- composer
- laravel || lumen >= 8.0

## 安装

```Shell
composer require pwf/laravel-pay
```

### laravel 用户

#### 配置文件

```Shell
php artisan vendor:publish --provider="Pwf\LaravelPay\PwfPayServiceProvider" --tag=pwf-pay
```

### lumen 用户

#### 配置文件

请手动复制配置文件

#### service provider

```PHP
$app->register(Pwf\LaravelPay\PwfPayServiceProvider::class);
```

## 使用方法

```PHP
use PwfPay;

$params = [
    "trade_name" => "trade_name",
    "pay_type" => 1,
    "fiat_currency" => "EUR",
    "fiat_amount" => 0.01,
    "out_trade_no" => "order-001",
    "subject" => "order-test",
    "timestamp" => 1657895835,
    "return_url" => "https://www.return.com/return",
    "collection_model" => 1
];

$result = PwfPay::wallet()->payAddress($params);

print_r($result);
```

具体使用说明请传送至 [https://github.com/pwfcom/pwf-paysdk-for-php](https://github.com/pwfcom/pwf-paysdk-for-php)

## License

MIT
