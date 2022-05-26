<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 16:36
 * Des: 189. 轮转数组
 *      https://leetcode.cn/problems/rotate-array/
 *      给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k)
    {
        $len = count($nums);
        $k = $k % $len;
        if ($k == 0) return;
        $this->reverse($nums, 0, $len - $k - 1);
        $this->reverse($nums, $len - $k, $len - 1);
        $this->reverse($nums, 0, $len - 1);

        //方法二
        $total = count($nums);
        if ($total < $k) {
            $k = $k % $total;
        }
        $tmp = array_splice($nums, 0, $total - $k);
        $nums = array_merge($nums, $tmp);
    }

    function reverse(&$nums, $start, $end)
    {
        while ($start < $end) {
            $temp = $nums[$start];
            $nums[$start] = $nums[$end];
            $nums[$end] = $temp;
            $start++;
            $end--;
        }
    }
}

/**
 * 执行用时：44 ms, 在所有 PHP 提交中击败了99.53%的用户
 * 内存消耗：30 MB, 在所有 PHP 提交中击败了36.75%的用户
 * 通过测试用例：38 / 38
 */