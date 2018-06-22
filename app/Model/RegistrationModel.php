<?php
/**
 * Created by PhpStorm.
 * User: Pang
 * Date: 6/28/2017
 * Time: 10:21 AM
 */

namespace App\Model;

use DB;
use Hash;
use Illuminate\Support\Facades\Log;

class RegistrationModel
{

    public function createUser($username, $firstname, $lastname, $password, $email, $permission) {
        $create_time = date('Y-m-d H:i:s');
        Log::alert($create_time);
        $id = DB::table('t_user')->insertGetId([
            'username'      => $username,
            'firstname'     => $firstname,
            'lastname'      => $lastname,
            'email'         => $email,
            'permission'    => $permission,
            'pwd'           => Hash::make($password),
            'created_at'    => $create_time,
            'is_verified'   => 'NO'
        ]);
    }

    public function  getUserByUsername($username) {

        $user = DB::table('t_user')
            ->where('username', '=', $username)
            ->first();
        return $user;
    }

    public function  getRememberFromTable($user_id) {

        $user = DB::table('t_user')
            ->where('id', '=', $user_id)
            ->first();
        return $user->remember;
    }

    public function  insertUser($username, $password, $remember) {

        DB::table('t_user')->insert(
            ['username' => $username, 'password' => $password, 'remember' => $remember]
        );
    }

    public function  insertValueData($user_id, $e_Electrical,$s_Electrical,$w_Electrical,$hw_Electrical,$cooker,$lighting,$dueDate,$kitchen,$combined, $water, $gas) {

        DB::table('t_energy')->insert(
            [   'user_id' => $user_id,
                'date' => $dueDate,
                'e_energy' => $e_Electrical,
                's_energy' => $s_Electrical,
                'h_energy' => $w_Electrical,
                'hw_energy' => $hw_Electrical,
                'cook' => $cooker,
                'light' => $lighting,
                'kitchen' => $kitchen,
                'combine_energy' => $combined,
                'water'          => $water,
                'gas'            => $gas
            ]
        );
    }

    public  function getEachDataFromTable($user_id, $i){

        /* Only for MySQL */
        /*$sql = "SELECT
                    t0.*
                    FROM t_energy t0
                    WHERE
                        t0.user_id = $user_id AND  t0.date >= DATE_ADD(NOW(),INTERVAL -$i-1 MONTH) AND t0.date <= DATE_ADD(NOW(),INTERVAL -($i) MONTH)";
        */
        /* Only for SQLServer */
        $sql = "SELECT
                    t0.*
                    FROM t_energy t0
                    WHERE
                        t0.user_id = $user_id AND  t0.date >= dateadd(MONTH, -$i-1, getdate()) AND t0.date <= dateadd(MONTH, -($i), getdate())";

        return DB::select($sql);
    }

    public  function getThisMonth(){

        $get_first = DB::table('t_energy')
            ->orderby('date', 'desc')
            ->first();

        $date = $get_first->date; // pass the value of input first.
        $date = explode('-', $date); // explode to get array of YY-MM-DD
        $first_month = $date[1];
        $first_year = $date[0];


        $get_final = DB::table('t_energy')
            ->orderby('date', 'asc')
            ->first();

        //$get_final = DB::table('t_energy')->order_by('date', 'asc')->first();
        $date = $get_final->date; // pass the value of input first.
        $date = explode('-', $date); // explode to get array of YY-MM-DD
        $final_month = $date[1];
        $final_year = $date[0];
        $period = $first_month - $final_month + 1 + 12*($first_year - $final_year);

        return $period;
    }

    public function insertUnitCost($user_id, $e_cost, $w_cost, $g_cost/*, $cost_date*/){
        // $new_date = date("Y-m-d", strtotime($cost_date));
        $new_date = date("Y-m-d");
        DB::table('t_unitcost')->insert(
            ['user_id' => $user_id, 'e_cost' => $e_cost, 'w_cost' => $w_cost, 'g_cost' => $g_cost, 'cost_date' => $new_date]
        );
    }

    public function getFinalUnitCost($user_id)
    {
        $sql = "SELECT *
                FROM t_unitcost
                WHERE
                    t_unitcost.user_id = $user_id AND 
                    t_unitcost.cost_id = (SELECT MAX(t_unitcost.cost_id) 
                                            FROM t_unitcost
                                            WHERE t_unitcost.user_id = $user_id)";
        return DB::select($sql);
    }

    public function getCostDataFromView($user_id, $i){
        /* Only for MySQL */
        /*$sql = "SELECT *
                    FROM energy_cost
                    WHERE
                        energy_cost.user_id = $user_id AND  energy_cost.date >= DATE_ADD(NOW(),INTERVAL -$i-1 MONTH) AND energy_cost.date <= DATE_ADD(NOW(),INTERVAL -($i) MONTH)";
        */
        /* Only for SQLServer */                        
        $sql = "SELECT *
                    FROM energy_cost
                    WHERE
                        energy_cost.user_id = $user_id AND  energy_cost.date >= dateadd(MONTH, -$i-1, getdate()) AND energy_cost.date <= dateadd(MONTH, -($i), getdate())";
        return DB::select($sql);
    }

    public  function getCostMonth(){

        $get_first = DB::table('energy_cost')
            ->orderby('date', 'desc')
            ->first();

        $date = $get_first->date; // pass the value of input first.
        $date = explode('-', $date); // explode to get array of YY-MM-DD
        $first_month = $date[1];
        $first_year = $date[0];


        $get_final = DB::table('energy_cost')
            ->orderby('date', 'asc')
            ->first();

        //$get_final = DB::table('t_energy')->order_by('date', 'asc')->first();
        $date = $get_final->date; // pass the value of input first.
        $date = explode('-', $date); // explode to get array of YY-MM-DD
        $final_month = $date[1];
        $final_year = $date[0];
        $period = $first_month - $final_month + 1 + 12*($first_year - $final_year);

        return $period;
    }
}