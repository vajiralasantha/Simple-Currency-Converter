# Simple PHP Currency Converter
A light weight PHP class that can convert two currencies using exchangerate.guru API.

Usage:

Install via composer

```"vajiral/simple-currency-converter": "1.0.0"```

In your PHP file

```php
<?php

use BigV\CurrencyConverter;

require __DIR__ . "/../vendor/autoload.php";

$converter = new CurrencyConverter();
$converter->setCurrencyFrom("USD");
$converter->setCurrencyTo("LKR");
$converter->setAmount(10);

$result = $converter->convertCurrency();

?>
```
