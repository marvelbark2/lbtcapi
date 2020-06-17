<?php

namespace prospeak\lbtcapi\Account;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;
use prospeak\lbtcapi\models\Trade;

class TradesReleased extends Controller
{
    static function updatetodb()
    {
        $helper = LbtcApiPolicy::apis('/api/dashboard/released/', 'GET');
        $wallet = Trade::create([
            'type' => 'Released',
            //  TODO
        ]);
        return $helper['data'];
    }
    static function all()
    {
        $all = LbtcApiPolicy::apis('/api/dashboard/released/', 'GET');
        return response()->json($all, 200);
    }
}
