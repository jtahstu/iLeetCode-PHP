<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/21 6:16
 * Des: 剑指 Offer 45. 把数组排成最小的数
 *      https://leetcode.cn/problems/ba-shu-zu-pai-cheng-zui-xiao-de-shu-lcof/
 *      输入一个非负整数数组，把数组里所有数字拼接起来排成一个数，打印能拼接出的所有数字中最小的一个。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return String
     */
    function minNumber($nums)
    {
        usort($nums, function ($a, $b) {
            return strval($a) . strval($b) >= strval($b) . strval($a);
        });
        return implode('', $nums);
    }

    function minNumber自己想的($nums)
    {
        array_multisort($nums, SORT_STRING, SORT_ASC, $nums);
        $hash = [];
        for ($i = 0; $i < count($nums); $i++) {
            $str = strval($nums[$i]);
            $hash[$str[0]][] = $nums[$i];
        }
        ksort($hash);
        $res = '';
        foreach ($hash as $k => $items) {
            $sort_arr = [];
            $max_len = strlen(strval(max($items)));
            for ($i = 0; $i < count($items); $i++) {
                $item = strval($items[$i]);
                $item_len = strlen($item);
                if ($item_len == 1) {
                    $sort_arr[] = intval(str_repeat($item[0], $max_len));
                } else {
                    $end = $item[$item_len - 1];
                    if ($end > $item[0]) $sort_arr[] = intval($item . str_repeat($item[1], $max_len - $item_len));
                    else $sort_arr[] = intval($item . str_repeat($item[0], $max_len - $item_len));
                }
            }
            array_multisort($sort_arr, SORT_NUMERIC, SORT_ASC, $items);
            $res .= implode('', $items);
        }
        return $res;
    }
}

var_dump((new Solution)->minNumber([3, 30, 34, 5, 9]));
var_dump((new Solution)->minNumber([121, 12]));
var_dump((new Solution)->minNumber([824, 938, 1399, 5607, 6973, 5703, 9609, 4398, 8247]));  //"1399 4398 5607 5703 6973 8247 824 938 9609"  "1399 4398 5607 5703 6973 824 8247 938 9609"

/**
 * 我擦, 我这调试半天想出来的规律, 实际就是一个自定义排序, 我擦嘞
 * 执行用时：8 ms, 在所有 PHP 提交中击败了85.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了75.00%的用户
 * 通过测试用例：222 / 222
 */