# Simple PHP Currency Converter
A light weight PHP class that can convert two currencies using exchangerate.guru API.

Usage:

Install via composer

```"composer require vajiral/simple-currency-converter"```

In your PHP file

```php
<?php

use BigV\CurrencyCodes;
use BigV\CurrencyConverter;

require __DIR__ . "/../vendor/autoload.php";

$converter = new CurrencyConverter();
$converter->setCurrencyFrom(CurrencyCodes::ISO_USD);
$converter->setCurrencyTo(CurrencyCodes::ISO_LKR);
$converter->setAmount(10);

$result = $converter->convertCurrency();

?>
```
