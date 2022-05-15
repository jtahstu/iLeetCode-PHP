<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/14 22:29
 * Des: 6068. 毯子覆盖的最多白色砖块数
 *      https://leetcode.cn/problems/maximum-white-tiles-covered-by-a-carpet/
 */

class Solution
{

    /**
     * @param Integer[][] $tiles
     * @param Integer $carpetLen
     * @return Integer
     */
    function maximumWhiteTiles($tiles, $carpetLen)
    {
//        $carpetLen++;
        $dp = [[0]];
        $sort_arr = [];
        foreach ($tiles as $tile) {
            $sort_arr[] = $tile[0];
        }
        array_multisort($sort_arr, SORT_NUMERIC, SORT_ASC, $tiles);
        $res = [];
        $n = count($tiles);
        $m = count($tiles[0]);
        for ($i = 1; $i < $n; $i++) {
            if ($tiles[$i][0] == $tiles[$i - 1][1] + 1) {
                print_r($tiles[$i], $tiles[$i - 1]);
                $tiles[$i - 1][1] = $tiles[$i][1];
                unset($tiles[$i]);
            }
        }
        print_r($tiles);
        $tiles = array_values($tiles);
        for ($i = 0; $i < count($tiles); $i++) {
            $pre_count = $tiles[$i - 1][1] - $tiles[$i - 1][0] + 1;
            for ($j = $tiles[$i][0]; $j <= $tiles[$i][1]; $j++) {
//                $dp[$i][$j] = $dp[$i][$j - 1] + 1;
//                if (isset($dp[$i - 1][$j - $carpetLen])) {
//                    $res[$j] = $dp[$i][$j] + $pre_count - $dp[$i - 1][$j - $carpetLen];
//                } else {
//                    $res[$j] = $dp[$i][$j];
//                }
                if (isset($dp[$i - 1][$j - $carpetLen])) {
                    $dp[$i][$j] = max($j-$tiles[$i][0] + 1, $dp[$i][$j - 1] + $dp[$i - 1][$j - $carpetLen]);
                } else {

                }
//                if ($j == 23) {
//                    var_dump( $tiles[$i - 1]);
//                    var_dump([$dp[$i][$j], $pre_count, $dp[$i - 1][$j - $carpetLen]]);
//                }
            }
        }
        print_r($dp);
        print_r($res);
        return max($res);
    }
}

//var_dump((new Solution)->maximumWhiteTiles([[1, 5], [10, 11], [12, 18], [20, 25], [30, 32]], 10));
//var_dump((new Solution)->maximumWhiteTiles([[1,5],[10,11],[12,18],[20,25],[30,32]], 10));
//var_dump((new Solution)->maximumWhiteTiles([[10, 11], [1, 1]], 2));
var_dump((new Solution)->maximumWhiteTiles([[8051,8057],[8074,8089],[7994,7995],[7969,7987],[8013,8020],[8123,8139],[7930,7950],[8096,8104],[7917,7925],[8027,8035],[8003,8011]],9854));

//GG