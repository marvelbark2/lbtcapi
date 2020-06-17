<?php

namespace prospeak\lbtcapi\Trades;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;

class TradesAll extends Controller
{
    static function messages($trade_id)
    {
        $trade_messages = LbtcApiPolicy::apis('/api/contact_messages/' . $trade_id . '/', 'GET');
        // ToDo
        return response()->json($trade_messages, 200);
    }
    static function message_sent($trade_id, $message)
    {
        $message = ['msg' => $message];
        //TODO : send images
        $trade_messages = LbtcApiPolicy::apis('/api/contact_message_post/' . $trade_id . '/', 'POST', $message);
        // ToDo
        return response()->json($trade_messages, 200);
    }
    static function create($ad_id, $amount, $msg = null)
    {
        $opt = ['amount' => $amount, 'message' => $msg];
        $trade = LbtcApiPolicy::apis('/api/contact_message_post/' . $ad_id . '/', 'POST', $opt);
        return response()->json($trade, 200);
    }
    static function show($trade_id)
    {
        $trade_show = LbtcApiPolicy::apis('/api/contact_info/' . $trade_id . '/', 'GET');
        return response()->json($trade_show, 200);
    }
    static function paid($trade_id)
    {
        $trade_paid = LbtcApiPolicy::apis('/api/contact_mark_as_paid/' . $trade_id . '/', 'POST');
        return response()->json($trade_paid, 200);
    }
    static function release($trade_id)
    {
        $trade_release = LbtcApiPolicy::apis('/api/contact_release/' . $trade_id . '/', 'POST');
        return response()->json($trade_release, 200);
    }

    static function cancel($trade_id)
    {
        $trade_cancel = LbtcApiPolicy::apis('/api/contact_dispute/' . $trade_id . '/', 'POST');
        return response()->json($trade_cancel, 200);
    }
    static function dispute($trade_id)
    {
        $trade_dispute = LbtcApiPolicy::apis('/api/contact_dispute/' . $trade_id . '/', 'POST');
        return response()->json($trade_dispute, 200);
    }
    static function feedback($username)
    {
        $trade_feedback = LbtcApiPolicy::apis('/api/feedback/' . $username . '/', 'POST');
        return response()->json($trade_feedback, 200);
    }
}
