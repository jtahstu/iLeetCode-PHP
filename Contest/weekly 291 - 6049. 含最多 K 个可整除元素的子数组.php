<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/1 11:36
 * Des: todo list
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @param Integer $p
     * @return Integer
     */
    function countDistinct($nums, $k, $p)
    {
        $l = count($nums);
        $list = [];
        for ($i = 0; $i < $l; $i++) {
            for ($j = $i; $j < $l; $j++) {
                $s = array_slice($nums, $i, $j - $i + 1);
                $count = 0;
                for ($x = 0; $x < count($s); $x++) {
                    if ($s[$x] % $p == 0) {
                        $count++;
                    }
                }
                if ($count <= $k) {
                    $list[] = implode(',', $s);
                }
            }
        }
//        print_r($list);
        return count(array_unique($list));
    }
}

var_dump((new Solution)->countDistinct([2,3,3,2,2],2,2));
var_dump((new Solution)->countDistinct([1,2,3,4],4,1));