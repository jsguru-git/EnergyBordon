<?php

namespace App\Model;

use DB;

/**
 * Created by PhpStorm.
 * User: front
 * Date: 2017/8/29
 * Time: 22:35
 */
class UserModel
{
    public function getUserById($id)
    {
        $user = DB::table('t_user')->where('id', $id)->first();
        return $user;
    }

    public function getUserByUsername($username)
    {
        $user = DB::table('t_user')->where('username', $username)->first();
        return $user;
    }

    public function insertUser($username, $pwd)
    {
        DB::table('t_user')->insert(
            ['username' => $username, 'pwd' => $pwd]
        );
    }

    public function getRounds()
    {
        return DB::select(
            "SELECT
                t0.id,
                t0.round_name,
                t0.period_time,
                t1.board_count,
                t0.period_time * t1.board_count AS total_time
              FROM t_round t0
              LEFT JOIN
                  (SELECT
                        round_id, COUNT(id) AS `board_count`
                      FROM t_round_boards
                      GROUP BY round_id) t1
              ON t0.id = t1.round_id"
        );
    }

    public function getRoundById($round_id)
    {
        $user = DB::table('t_round')->where('id', $round_id)->first();
        return $user;
    }

    public function getGameboards($round_id)
    {
        return DB::select(
            "SELECT
                  t0.board_id,
                  t1.board_name,
                  t1.file_name,
                  t1.created_time,
                  t1.size
                FROM t_round_boards t0
                LEFT JOIN t_game_board t1 ON t0.board_id = t1.id
                WHERE t0.round_id = $round_id"
        );
    }
}