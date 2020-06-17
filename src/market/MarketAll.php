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
        return response()->json($all_buys, 200);
    }
    static function sells_all()
    {
        $all_sells = LbtcApiPolicy::apis('/sell-bitcoins-online/.json', 'GET');
        return response()->json($all_sells, 200);
    }
    static function all_currencies()
    {
        $all_currencies = LbtcApiPolicy::apis('/api/currencies/', 'GET');
        return response()->json($all_currencies, 200);
    }
    static function all_oayemntmethods()
    {
        $all_oayemntmethods = LbtcApiPolicy::apis('/api/payment_methods/', 'GET');
        return response()->json($all_oayemntmethods, 200);
    }
    static function all_countries()
    {
        $all_countries = LbtcApiPolicy::apis('/api/countrycodes/', 'GET');
        return response()->json($all_countries, 200);
    }
    static function payemntmethods_by_country($countrycode)
    {
        $mets_by_country = LbtcApiPolicy::apis('/api/payment_methods/' . $countrycode . '/', 'GET');
        return response()->json($mets_by_country, 200);
    }
    static function buys_by_currency($currency)
    {
        $buys_by_currency = LbtcApiPolicy::apis('/buy-bitcoins-online/' . $currency . '/.json', 'GET');
        return response()->json($buys_by_currency, 200);
    }
    static function buys_by_country($country)
    {
        $buys_by_country = LbtcApiPolicy::apis('/buy-bitcoins-online/' . $country[0] . '/' . $country[1] . '/.json', 'GET');
        return response()->json($buys_by_country, 200);
    }
    static function buys_by_currency_payemnt($currency, $payment_method)
    {
        $cp_buys = LbtcApiPolicy::apis('/buy-bitcoins-online/' . $currency . '/' . $payment_method . '/.json', 'GET');
        return response()->json($cp_buys, 200);
    }
    static function sells_by_currency($currency)
    {
        $sells_by_currency = LbtcApiPolicy::apis('/sell-bitcoins-online/' . $currency . '/.json', 'GET');
        return response()->json($sells_by_currency, 200);
    }
    static function sells_by_country($country)
    {
        $sells_by_country = LbtcApiPolicy::apis('/sell-bitcoins-online/' . $country[0] . '/' . $country[1] . '/.json', 'GET');
        return response()->json($sells_by_country, 200);
    }
    static function sells_by_currency_payemnt($currency, $payment_method)
    {
        $cp_sells = LbtcApiPolicy::apis('/sell-bitcoins-online/' . $currency . '/' . $payment_method . '/.json', 'GET');
        return response()->json($cp_sells, 200);
    }
    static function tickers()
    {
        $tickers = LbtcApiPolicy::apis('/bitcoinaverage/ticker-all-currencies/', 'GET');
        return response()->json($tickers, 200);
    }
    static function statistics_by_currency($currency)
    {
        $stat1 = LbtcApiPolicy::apis('/bitcoincharts/' . $currency . '/trades.json', 'GET');
        $stat2 = LbtcApiPolicy::apis('/bitcoincharts/' . $currency . '/orderbook.json', 'GET');
        $data = [
            'trades' => $stat1,
            'orderbook' => $stat2
        ];
        return response()->json($data, 200);
    }
}
