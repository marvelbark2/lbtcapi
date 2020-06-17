<?php

namespace prospeak\lbtcapi\Wallet;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;
use Prospeak\Lbtcapi\Models\WalletTotal;


class WalletFees extends Controller
{
    static function updatetodb()
    {
        $helper = LbtcApiPolicy::apis('/api/fees/', 'GET');
        $wallet = WalletTotal::create([
            'deposit_fee' => $helper['data']['deposit_fee'],
            'outgoing_fee' => $helper['data']['outgoing_fee']
        ]);
        return $wallet;
    }
    static function test()
    {
        $helper = LbtcApiPolicy::apis('/api/myself/', 'GET');
        return $helper;
    }

    static function all()
    {
        $all = WalletTotal::all();
        return response()->json($all, 200);
    }
}
