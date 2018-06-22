<?php

namespace App\Model;

use DB;

class HouseInfoModel
{
    public function getHouseInfoById($id)
    {
        $houseInfo = DB::table('t_houseinfo')->where('id', '=', $id)->first();
        return $houseInfo;
    }
    public function getHouseInfoByUserId($user_id)
    {
        $houseInfo = DB::table('t_houseinfo')->where('user_id', '=', $user_id)->first();
        return $houseInfo;
    }
}