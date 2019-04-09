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
