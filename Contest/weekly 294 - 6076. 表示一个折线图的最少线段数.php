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
     * @param Integer[][] $stockPrices
     * @return Integer
     */
    function minimumLines($stockPrices)
    {
        if (count($stockPrices) == 1) return 0;
        $res = 1;
        $n = count($stockPrices);
        $sort_arr = [];
        foreach ($stockPrices as $stock) {
            $sort_arr[] = $stock[0];
        }
        array_multisort($sort_arr, SORT_NUMERIC, SORT_ASC, $stockPrices);
        $x = ($stockPrices[1][1] - $stockPrices[0][1]);
        $y = ($stockPrices[1][0] - $stockPrices[0][0]);
        for ($i = 2; $i < $n; $i++) {
            $a = ($stockPrices[$i][1] - $stockPrices[$i - 1][1]);
            $b = ($stockPrices[$i][0] - $stockPrices[$i - 1][0]);
            //这里要是按我之前那样算斜率, 貌似要保留17位小数精度才行
            if (($x * $b) !== ($y * $a)) {  //TMD, WTF
//                print_r([$x * $b , $y * $a]);
                $res++;
            }
            $x = $a;
            $y = $b;
        }
        return $res;
    }
}

var_dump((new Solution)->minimumLines([[1, 7], [2, 6]]));
var_dump((new Solution)->minimumLines([[1, 7], [2, 6], [3, 5], [4, 4], [5, 4], [6, 3], [7, 2], [8, 1]]));