## 依賴

- php >= 7.3 (v3.1.0 开始 >=7.4.0)
- composer
- laravel || lumen >= 8.0

## 安裝

```Shell
composer require pwf/laravel-pay
```

### laravel 用戶

#### 配置文件

```Shell
php artisan vendor:publish --provider="Pwf\LaravelPay\PwfPayServiceProvider" --tag=pwf-pay
```

### lumen 用戶

#### 配置文件

請手動複製配置文件

#### service provider

```PHP
$app->register(Pwf\LaravelPay\PwfPayServiceProvider::class);
```

## 使用方法

```PHP
use PwfPay;

$params = [
    "trade_name" => "trade_name",
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

具體使用說明請傳送至 [https://github.com/pwfcom/pwf-paysdk-for-php](https://github.com/pwfcom/pwf-paysdk-for-php)

## License

MIT
