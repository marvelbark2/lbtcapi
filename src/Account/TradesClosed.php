<?php

namespace prospeak\lbtcapi\Account;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;
use prospeak\lbtcapi\models\Trade;

class TradesClosed extends Controller
{
    static function updatetodb()
    {
        $helper = LbtcApiPolicy::apis('/api/dashboard/closed/', 'GET');
        $wallet = Trade::create([
            'type' => 'Closed',
            //  TODO
        ]);
        return $helper['data'];
    }
    static function all()
    {
        $all = LbtcApiPolicy::apis('/api/dashboard/closed/', 'GET');
        return response()->json($all, 200);
    }
}
