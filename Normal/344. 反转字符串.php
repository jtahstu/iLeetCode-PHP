<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/29 21:55
 * Des: 344. 反转字符串
 *      https://leetcode.cn/problems/reverse-string/
 *      编写一个函数，其作用是将输入的字符串反转过来。输入字符串以字符数组 s 的形式给出。
 *      不要给另外的数组分配额外的空间，你必须原地修改输入数组、使用 O(1) 的额外空间解决这一问题。
 */

class Solution
{

    /**
     * @param String[] $s
     * @return NULL
     */
    function reverseString(&$s)
    {
        $l = 0;
        $r = count($s) - 1;
        while ($l < $r) {
            [$s[$l], $s[$r]] = [$s[$r], $s[$l]];
            $l++;
            $r--;
        }
    }
}

/**
 * 执行用时：52 ms, 在所有 PHP 提交中击败了46.45%的用户
 * 内存消耗：39.1 MB, 在所有 PHP 提交中击败了89.10%的用户
 * 通过测试用例：477 / 477
 */