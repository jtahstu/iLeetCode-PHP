<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/22 10:26
 * Des: todo list
 */

class Solution
{

    /**
     * @param Integer[] $capacity
     * @param Integer[] $rocks
     * @param Integer $additionalRocks
     * @return Integer
     */
    function maximumBags($capacity, $rocks, $additionalRocks)
    {
        $m_count = 0;
        $n = count($capacity);
        $s_arr = [];
        for ($i = 0; $i < $n; $i++) {
            if ($capacity[$i] == $rocks[$i]) {
                $m_count++;
                continue;
            }
            $s_arr[] = $capacity[$i] - $rocks[$i];
        }
        $res = $m_count;
//        print_r($res);
        sort($s_arr);
//        echo json_encode($s_arr) . PHP_EOL;
        foreach ($s_arr as $c) {
            if ($c <= $additionalRocks) {
                $res++;
            }
            if ($c > $additionalRocks) {
                break;
            }
            $additionalRocks -= $c;
        }
        return $res;
    }
}

var_dump((new Solution)->maximumBags([54, 18, 91, 49, 51, 45, 58, 54, 47, 91, 90, 20, 85, 20, 90, 49, 10, 84, 59, 29, 40, 9, 100, 1, 64, 71, 30, 46, 91],
    [14, 13, 16, 44, 8, 20, 51, 15, 46, 76, 51, 20, 77, 13, 14, 35, 6, 34, 34, 13, 3, 8, 1, 1, 61, 5, 2, 15, 18], 77));