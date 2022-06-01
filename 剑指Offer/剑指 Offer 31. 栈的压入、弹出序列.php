<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/31 10:05
 * Des: 剑指 Offer 31. 栈的压入、弹出序列
 *      https://leetcode.cn/problems/zhan-de-ya-ru-dan-chu-xu-lie-lcof/
 */

class Solution
{

    /**
     * @param Integer[] $pushed
     * @param Integer[] $popped
     * @return Boolean
     */
    function validateStackSequences($pushed, $popped)
    {
        $queue = [];
        foreach ($popped as $val) {
            if ($val === end($queue)) {
                array_pop($queue);
                continue;
            }
            $flag = false;
            while ($pushed) {
                $p = array_shift($pushed);
                if ($p == $val) {
                    $flag = true;
                    break;
                }
                $queue[] = $p;
            }
            if (!$flag) {
                return false;
            }
        }
        return true;
    }
}

/**
 * 执行用时：32 ms, 在所有 PHP 提交中击败了40.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了53.33%的用户
 * 通过测试用例：151 / 151
 */