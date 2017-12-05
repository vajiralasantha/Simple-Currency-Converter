<?php

use BigV\CurrencyConverter;

require __DIR__ . "/../vendor/autoload.php";

$converter = new CurrencyConverter();
$converter->setCurrencyFrom("USD");
$converter->setCurrencyTo("LKR");
$converter->setAmount(10);

$result = $converter->convertCurrency();

?>
