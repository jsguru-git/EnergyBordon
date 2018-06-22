<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\HouseInfoModel;
use Illuminate\Support\Facades\Log;

class HouseInfoController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getHouseInfo()
    {
        $houseInfoModel = new HouseInfoModel();
        $user_id = session(SESS_USER_ID);
        $value = $houseInfoModel->getHouseInfoByUserId($user_id);
        // logger($value);

        $temper = $value->temper;
        $humidity = $value->humidity;
        $co2 = $value->co2;
        $outtemper = $valus->outtemper;
        return response()->json([
            "temper"        => $temper,
            "humidity"      => $humidity,
            "co2"      		=> $co2,
            "outtemper"     => $outtemper
        ]);
    }
}