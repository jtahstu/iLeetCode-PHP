<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/1 10:49
 * Des: todo list
 */

class Solution
{

    /**
     * @param Integer[] $cards
     * @return Integer
     */
    function minimumCardPickup($cards)
    {
        $list = [];
        foreach ($cards as $k => $card) {
            $list[$card][] = $k;
        }
//        print_r($list);
        $min = PHP_INT_MAX;
        foreach ($list as $ks) {
            if (count($ks) >= 2) {
                for ($i = 1; $i < count($ks); $i++) {
                    $min = min($min, ($ks[$i] - $ks[$i - 1]));
                }
            }
        }
        return $min == PHP_INT_MAX ? -1 : $min + 1;
    }
}

var_dump((new Solution)->minimumCardPickup([3, 4, 2, 3, 4, 7]));
var_dump((new Solution)->minimumCardPickup([1, 0, 5, 3]));