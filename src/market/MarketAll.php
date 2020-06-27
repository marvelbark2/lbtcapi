<?php

namespace prospeak\lbtcapi\Market;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;

class MarketAll extends Controller
{
    static function buys_all()
    {
        $all_buys = LbtcApiPolicy::apis('/buy-bitcoins-online/.json', 'GET');
        return $all_buys;
    }
    static function sells_all()
    {
        $all_sells = LbtcApiPolicy::apis('/sell-bitcoins-online/.json', 'GET');
        return $all_sells;
    }
    static function all_currencies()
    {
        $all_currencies = LbtcApiPolicy::apis('/api/currencies/', 'GET');
        return $all_currencies;
    }
    static function all_oayemntmethods()
    {
        $all_oayemntmethods = LbtcApiPolicy::apis('/api/payment_methods/', 'GET');
        return $all_oayemntmethods;
    }
    static function all_countries()
    {
        $all_countries = LbtcApiPolicy::apis('/api/countrycodes/', 'GET');
        return $all_countries;
    }
    static function payemntmethods_by_country($countrycode)
    {
        $mets_by_country = LbtcApiPolicy::apis('/api/payment_methods/' . $countrycode . '/', 'GET');
        return response()->json($mets_by_country, 200);
    }
    static function buys_by_currency($currency)
    {
        $buys_by_currency = LbtcApiPolicy::apis('/buy-bitcoins-online/' . $currency . '/.json', 'GET');
        return $buys_by_currency;
    }
    static function buys_by_payment($payment)
    {
        $buys_by_payment = LbtcApiPolicy::apis('/buy-bitcoins-online/' . $payment . '/.json', 'GET');
        return $buys_by_payment;
    }
    static function buys_by_country($country)
    {
        $buys_by_country = LbtcApiPolicy::apis('/buy-bitcoins-online/' . $country[0] . '/' . $country[1] . '/.json', 'GET');
        return $buys_by_country;
    }
    static function buys_by_currency_payemnt($currency, $payment_method)
    {
        $cp_buys = LbtcApiPolicy::apis('/buy-bitcoins-online/' . $currency . '/' . $payment_method . '/.json', 'GET');
        return $cp_buys;
    }
    static function sells_by_currency($currency)
    {
        $sells_by_currency = LbtcApiPolicy::apis('/sell-bitcoins-online/' . $currency . '/.json', 'GET');
        return $sells_by_currency;
    }
    static function sells_by_country($country)
    {
        $sells_by_country = LbtcApiPolicy::apis('/sell-bitcoins-online/' . $country[0] . '/' . $country[1] . '/.json', 'GET');
        return $sells_by_country;
    }
    static function sells_by_currency_payemnt($currency, $payment_method)
    {
        $cp_sells = LbtcApiPolicy::apis('/sell-bitcoins-online/' . $currency . '/' . $payment_method . '/.json', 'GET');
        return $cp_sells;
    }
    static function tickers()
    {
        $tickers = LbtcApiPolicy::apis('/bitcoinaverage/ticker-all-currencies/', 'GET');
        return $tickers;
    }
    static function statistics_by_currency($currency)
    {
        $stat1 = LbtcApiPolicy::apis('/bitcoincharts/' . $currency . '/trades.json', 'GET');
        $stat2 = LbtcApiPolicy::apis('/bitcoincharts/' . $currency . '/orderbook.json', 'GET');
        $data = [
            'trades' => $stat1,
            'orderbook' => $stat2
        ];
        return $data;
    }
}
