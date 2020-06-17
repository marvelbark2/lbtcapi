<?php

namespace prospeak\lbtcapi\Wallet;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;
use Prospeak\Lbtcapi\Models\WalletHistory;


class WalletTransactions extends Controller
{
    static function updatetodb()
    {
        $helper = LbtcApiPolicy::apis('/api/wallet/', 'GET');
        $receive_30d = $helper['data']['received_transactions_30d'];
        $sent_30d = $helper['data']['received_transactions_30d'];
        $old_address_list = $helper['data']['old_address_list'];
        foreach ($receive_30d as $value) {
            $receive = WalletHistory::create([
                'amount' => $value['amount'],
                'description' => $value['description'],
                'created_at' => $value['created_at'],
                'type' => 'receive',
                '30d' => 1
            ]);
        }
        foreach ($old_address_list as $value) {
            $receive = WalletHistory::create([
                'amount' => $value['received'],
                'description' => $value['received'],
                'type' => 'receive',
                '30d' => 0
            ]);
        }
        foreach ($sent_30d as $value) {
            $sent = WalletHistory::create([
                'amount' => $value['amount'],
                'description' => $value['description'],
                'created_at' => $value['created_at'],
                'type' => 'send',
                '30d' => 1
            ]);
        }

        return $helper['data'];
    }

    public function all()
    {
        $all = WalletHistory::all();
        return response()->json($all, 200);
    }
}
