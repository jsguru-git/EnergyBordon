<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\RegistrationModel;
use App\Model\HouseInfoModel;
use Illuminate\Support\Facades\Log;

class LoginController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login()
    {
        $username = request("real-username");
        $password = request("real-password");

        if($username == null || $username == "") {
            return view("login", ["err" => "required username."]);
        }
        else if($password == null || $password == "") {
            return view("login", ["err" => "required password."]);
        }

        $userModel = new RegistrationModel();
        $user = $userModel->getUserByUsername($username);

        if($user == null)
        {
            return view("login", ["err" => "user not exists."]);
        }

        if($user->password != $password) {
            return view("login", ["err" => "password mismatch."]);
        }

        session()->put(SESS_USER_ID, $user->id);
        session()->put(SESS_USER_NAME, $user->username);

        return redirect("/main-board");
    }

    public function signUp()
    {

        $username = request("username");
        $password = request("password");
        $conf_password = request("conf-password");
        $remember = request("Remember");


        if($username == null || $username == "") {
            return view("signUp", ["err" => "required username"]);
        }
        else if($password == null || $password == "") {
            return view("signUp", ["err" => "required password"]);
        }
        else if($password != $conf_password) {
            return view("signUp", ["err" => "password mismatch"]);
        }

        $userModel = new RegistrationModel();
        $user = $userModel->getUserByUsername($username);


        if($user != null)
        {
            return view("signUp", ["err" => "user already registered"]);
        }

        $userModel->insertUser($username, $password, $remember);

        return view("login", ["msg" => "register success"]);
    }

    public function cost_setting()
    {
        // $e_Electrical = request('e_Electrical');
        // $s_Electrical = 0;
        // $w_Electrical = 0;
        // $hw_Electrical = 0;
        // $cooker = 0;
        // $lighting = 0;

        // $dueDate = request('dueDate');
        // $date = $dueDate; // pass the value of input first.
        // $date = explode('-', $date); // explode to get array of YY-MM-DD
        // $date[2] = '1'; // this would change the previous value of DD/Day to this one. Or input any value you want to execute when the button is triggered
        // $date = implode('-', $date); // that will output '2013-10-10'.
        // $date_1 = date_create($date);

        // $kitchen = 0;
        // $water = request('water');
        // $gas = request('Gas');

        // $combined = $e_Electrical + $e_Electrical +$s_Electrical +$w_Electrical +$cooker +$lighting +$kitchen;

        // $user_id = session(SESS_USER_ID);
        // if ($user_id == null) return view("login");
        // $userModel = new RegistrationModel();
        // $userModel->insertValueData($user_id,$e_Electrical,$s_Electrical,$w_Electrical,$hw_Electrical,$cooker,$lighting,$date_1,$kitchen,$combined, $water, $gas);

        // return redirect("/main-board");

        $e_cost = request('e_Electrical');
        $w_cost = request('water');
        $g_cost = request('Gas');
        // $cost_date = request('cost_date');
        $user_id = session(SESS_USER_ID);
        $costModel = new RegistrationModel();
        $costModel->insertUnitCost($user_id, $e_cost, $w_cost, $g_cost/*, $cost_date*/);

        return redirect("/main-board");
        // return response()->json([
        //     "success"       => $e_cost
        // ]);
    }

    public function setting()
    {
        $costModel = new RegistrationModel();
        $user_id = session(SESS_USER_ID);
        $finalUnitCost = $costModel->getFinalUnitCost($user_id);
        $data['cost'] = $finalUnitCost;
        return view('setting', $data);
    }

    public function getData()
    {
        $sum_e_data = 0;
        $sum_h_data = 0;
        $each_date = "";
        $h_energy = 0;
        $s_energy = 0;
        $sum_s_data = 0;
        $sum_cook = 0;
        $sum_kitchen = 0;
        $sum_light = 0;
        $e_data = [];
        $h_data = [];
        $hw_data = [];
        $s_data = [];
        $remember = 0;
        for ($i = 0;$i < 6;$i++)
        {
            $val = 0;
            $h_energy = 0;
            $hw_energy = 0;
            $s_energy = 0;
            $cook = 0;
            $light = 0;
            $kitchen = 0;

            $userModel = new RegistrationModel();
            $user_id = session(SESS_USER_ID);
            $value = $userModel->getEachDataFromTable($user_id, $i);
            logger($value);

            $remember = $userModel->getRememberFromTable($user_id);

            $tmp = '';
            for ($j = 0;$j < count($value);$j++)
            {
                logger($j);
                logger($value[$j]->e_energy);
                $val += $value[$j]->e_energy;
                $h_energy += $value[$j]->h_energy;
                $hw_energy += $value[$j]->hw_energy;
                $s_energy += $value[$j]->s_energy;
                // $each_date[$i] = $value[$j]->date;
                $tmp = $value[$j]->date;

                $cook += $value[$j]->cook;
                $light += $value[$j]->light;
                $kitchen += $value[$j]->kitchen;
            }
            logger($i);
            logger($val);
            $each_date[$i] = $tmp;
            $e_data[$i] = $val;
            $h_data[$i] = $h_energy;
            $hw_data[$i] = $hw_energy;
            $s_data[$i] = $s_energy;
            $sum_e_data += $val;
            $sum_h_data += $h_energy;
            $sum_s_data += $s_energy;

            $sum_cook += $cook;
            $sum_kitchen += $kitchen;
            $sum_light += $light;
        }
        logger($sum_e_data);
        logger($sum_s_data);
        logger($e_data[0]);
        $ave_e_data = $sum_e_data/6;
        $ave_h_data = $sum_h_data/6;
        $ave_s_data = $sum_s_data/6;
        /////////////////////////////////////////////////////////////
        $houseInfoModel = new HouseInfoModel();
        $user_id = session(SESS_USER_ID);
        $houseInfo = $houseInfoModel->getHouseInfoByUserId($user_id);

        $temper = $houseInfo->temper;
        $humidity = $houseInfo->humidity;
        $co2 = $houseInfo->co2;
        $outtemper = $houseInfo->outtemper;
        /////////////////////////////////////////////////////////////
        logger($each_date);
        return response()->json([
            "date"          => $each_date,
            "count"         => $e_data,
            "h_energy"      => $h_data,
            "hw_energy"     => $hw_data,
            "s_energy"      => $s_data  ,
            "average_e"     => $ave_e_data,
            "average_h"     => $ave_h_data,
            "average_s"     => $ave_s_data,
            "sum_cook"      => $sum_cook,
            "sum_light"     => $sum_light,
            "sum_kitchen"   => $sum_kitchen,
            "remember"      => $remember,
            "temper"        => $temper,
            "humidity"      => $humidity,
            "co2"           => $co2,
            "outtemper"     => $outtemper
        ]);
    }

    public  function  viewCost(){

        $each_energy = [];
        $each_value = [];

        $key = array("water", "gas","e_energy", "s_energy", "h_energy", "cook", "light","kitchen", "combine_energy" );
        logger($key);

        $userModel = new RegistrationModel();
        $AllMonth = $userModel->getThisMonth();
        //logger($newMonth);

        for ($i = 0;$i < 6;$i++)
        {
            for ($m = 0;$m < 9;$m++)
            {
                $each_value[$m] = 0;
            }

            $userModel = new RegistrationModel();
            $user_id = session(SESS_USER_ID);
            $value = $userModel->getEachDataFromTable($user_id,  $i);
            logger(count($value));
            logger($value);


            for ($j = 0;$j < count($value);$j++)
            {
                for ($k = 0;$k < 9;$k++)
                {
                    $each_value[$k] += $value[$j]->$key[$k];
                    if ($k == 4)
                    {
                        $each_value[$k] += $value[$j]->hw_energy;
                    }
                }
            }

            for ($k = 0;$k < 9;$k++)
            {
                $each_energy[$k][$i] = $each_value[$k];
            }

        }

        return response()->json([
            "all"       => $each_energy,
            "key"       => $key
        ]);
    }

    public function get_cost(){
        $each_energy = [];
        $each_value = [];

        $key = array("water", "gas","e_energy", "s_energy", "h_energy", "cook", "light","kitchen", "combine_energy" );
        logger($key);

        $userModel = new RegistrationModel();
        $AllMonth = $userModel->getCostMonth();
        //logger($newMonth);

        for ($i = 0;$i < 6;$i++)
        {
            for ($m = 0;$m < 9;$m++)
            {
                $each_value[$m] = 0;
            }

            $userModel = new RegistrationModel();
            $user_id = session(SESS_USER_ID);



            $value = $userModel->getCostDataFromView($user_id,  $i);

            for ($j = 0;$j < count($value);$j++)
            {
                for ($k = 0;$k < 9;$k++)
                {
                    $each_value[$k] += $value[$j]->$key[$k];
                    if ($k == 4)
                    {
                        $each_value[$k] += $value[$j]->hw_energy;
                    }
                }
            }

            for ($k = 0;$k < 9;$k++)
            {
                $each_energy[$k][$i] = $each_value[$k];
            }

        }

        return response()->json([
            "all"       => $each_energy,
            "key"       => $AllMonth
        ]);
    }
}
