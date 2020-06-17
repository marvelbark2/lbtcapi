<?php

namespace prospeak\lbtcapi\Account;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;

class Notification extends Controller
{
    static function updatetodb()
    {
        $helper = LbtcApiPolicy::apis('/api/notifications/', 'GET');
        // ToDo
        return $helper['data'];
    }
    static function all()
    {
        $all = LbtcApiPolicy::apis('/api/notifications/', 'GET');
        return response()->json($all, 200);
    }
    static function marked_read($notification_id)
    {
        $read = LbtcApiPolicy::apis('/api/notifications/mark_as_read/' . $notification_id . '/', 'POST');
        return response()->json($read, 200);
    }
    static function last_message()
    {
        $last_message = LbtcApiPolicy::apis('/api/recent_messages/', 'GET');
        //Store in db || TODO
        return response()->json($last_message, 200);
    }
}
