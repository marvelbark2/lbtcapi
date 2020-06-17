<?php

namespace prospeak\lbtcapi\Wallet;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;
use Prospeak\Lbtcapi\Models\WalletTotal;


class WalletBalance extends Controller
{
    static function updatetodb()
    {
        $helper = LbtcApiPolicy::apis('/api/wallet/', 'GET');
        $wallet = WalletTotal::create([
            'amount' => $helper['data']['total']['balance'],
            'addr' => $helper['data']['receiving_address']
        ]);
        return $helper['data'];
    }
    public function getfuns()
    {
        $last = WalletTotal::orderBy('id', 'DESC')->first();
        return response()->json($last, 200);
    }
    public function all()
    {
        $all = WalletTotal::all();
        return response()->json($all, 200);
    }
}
