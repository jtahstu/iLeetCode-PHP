<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/7 0:41
 * Des: 875. 爱吃香蕉的珂珂
 *      https://leetcode.cn/problems/koko-eating-bananas/
 *      珂珂喜欢吃香蕉。这里有 n 堆香蕉，第 i 堆中有 piles[i] 根香蕉。警卫已经离开了，将在 h 小时后回来。
 *      珂珂可以决定她吃香蕉的速度 k （单位：根/小时）。每个小时，她将会选择一堆香蕉，从中吃掉 k 根。如果这堆香蕉少于 k 根，她将吃掉这堆的所有香蕉，然后这一小时内不会再吃更多的香蕉。
 *      珂珂喜欢慢慢吃，但仍然想在警卫回来前吃掉所有的香蕉。
 *      返回她可以在 h 小时内吃掉所有香蕉的最小速度 k（k 为整数）。
 */

class Solution
{

    /**
     * @param Integer[] $piles
     * @param Integer $h
     * @return Integer
     */
    function minEatingSpeed($piles, $h)
    {
        $l = 1;
        $r = 10e9 + 1;
        while ($l < $r) {
            $mid = $l + (($r - $l) >> 1);
            $minute = $this->time($mid, $piles);
            if ($minute <= $h) $r = $mid;
            else $l = $mid + 1;
        }
        return $l;
    }

    function time($x, $piles)
    {
        $minute = 0;
        foreach ($piles as $pile) {
            $minute += ceil($pile / $x);
        }
        return $minute;
    }
}

print_r((new Solution)->minEatingSpeed([1, 1, 1, 1, 1, 1, 1, 15, 80], 15));

/**
 * 是的, 他可以一小时吃9亿根香蕉
 * 执行用时：100 ms, 在所有 PHP 提交中击败了90.00%的用户
 * 内存消耗：19.8 MB, 在所有 PHP 提交中击败了70.00%的用户
 * 通过测试用例：121 / 121
 */