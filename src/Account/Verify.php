<?php

namespace prospeak\lbtcapi\Account;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;


class Verify extends Controller
{
    static function info_user($username)
    {
        $userinfo = LbtcApiPolicy::apis('/api/account_info/' . $username . '/', 'GET');
        $userrealname = LbtcApiPolicy::apis('/api/real_name_verifiers/' . $username . '/', 'GET');
        return response()->json([$userinfo, $userrealname], 200);
    }
}
