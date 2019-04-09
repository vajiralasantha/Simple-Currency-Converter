<?php

namespace BigV;

use DOMDocument;

class CurrencyConverter {

    /**
     * @var string
     */
    private $currencyFrom;

    /**
     * @var string
     */
    private $currencyTo;

    /**
     * @var int
     */
    private $amount;

    /**
     * Base url of API.
     */
    const BASE_URL = "https://exchangerate.guru/";

    /**
     * CursConverter constructor.
     */
    public function __construct() {
        $this->currencyFrom = CurrencyCodes::ISO_USD;
        $this->currencyTo = CurrencyCodes::ISO_LKR;
        $this->amount = 1;
    }

    /**
     * Main function to convert currencies.
     *
     * @return array An array of results.
     */
    public function convertCurrency() {
        $url = self::BASE_URL . strtolower($this->currencyFrom) . "/" . strtolower($this->currencyTo) . "/" . $this->amount;
        $result = $this->parsePage($url);
        if (!empty($result)) {
            return array(
                "from" => $this->currencyFrom,
                "to" => $this->currencyTo,
                "amount" => $result[0],
                "result" => $result[1],
            );
        }

        return array();
    }

    /**
     * Function to parse web page and get values.
     *
     * @param string $url API url.
     *
     * @return array An array of parsed values.
     */
    private function parsePage($url) {
        $pageContent = $this->nativeCall($url);
        $internalErrors = libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTML($pageContent);

        $values = array();

        $inputs = $dom->getElementsByTagName('input');
        foreach ($inputs as $tag) {
            $values[] = $tag->getAttribute('value');
        }

        libxml_use_internal_errors($internalErrors);

        return $values;
    }

    /**
     * Function to remote call and get website content via CURL.
     *
     * @param string $url API url.
     *
     * @return mixed
     */
    private function nativeCall($url) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);

        return $result;
    }

    /**
     * @param string $currencyFrom
     */
    public function setCurrencyFrom($currencyFrom) {
        $this->currencyFrom = $currencyFrom;
    }

    /**
     * @param string $currencyTo
     */
    public function setCurrencyTo($currencyTo) {
        $this->currencyTo = $currencyTo;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount) {
        $this->amount = $amount;
    }
}