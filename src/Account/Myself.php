<?php

namespace prospeak\lbtcapi\Account;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;
use prospeak\lbtcapi\models\Trade;

class Myself extends Controller
{
    static function updatetodb()
    {
        $helper = LbtcApiPolicy::apis('/api/myself/', 'GET');
        $wallet = \App\User::create([
            //  TODO
        ]);
        return $helper['data'];
    }
    static function all()
    {
        $all = LbtcApiPolicy::apis('/api/myself/', 'GET');
        return response()->json($all, 200);
    }
}
