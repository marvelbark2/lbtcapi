<?php

namespace prospeak\lbtcapi\Ads;

use Illuminate\Http\Request;

use Prospeak\Lbtcapi\Policies\LbtcApiPolicy;
use App\Http\Controllers\Controller;

class AdsAll extends Controller
{
    static function myads($options)
    {
        $my_ads = LbtcApiPolicy::apis('/api/ads/', 'GET', $options);
        // ToDo
        return response()->json($my_ads, 200);
    }

    static function create($options)
    {
        $trade = LbtcApiPolicy::apis('/api/ad-create/', 'POST', $options);
        return response()->json($trade, 200);
    }
    static function show($ads_id)
    {
        $ads_show = LbtcApiPolicy::apis('/api/ad-get/' . $ads_id . '/', 'GET');
        return response()->json($ads_show, 200);
    }

    static function edit($ads_id, $options)
    {
        $ad_edit = LbtcApiPolicy::apis('/api/contact_release/' . $ads_id . '/', 'POST', $options);
        return response()->json($ad_edit, 200);
    }
    static function delete($ads_id)
    {
        $ads_delete = LbtcApiPolicy::apis('/api/ad-delete/' . $ads_id . '/', 'POST');
        return response()->json($ads_delete, 200);
    }
}
