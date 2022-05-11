<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/12 0:20
 * Des: 944. 删列造序
 *      https://leetcode.cn/problems/delete-columns-to-make-sorted/
 */

class Solution
{

    /**
     * @param String[] $strs
     * @return Integer
     */
    function minDeletionSize($strs)
    {
        $count = 0;
        $nn = count($strs);
        $mm = strlen($strs[0]);
        for ($m = 0; $m < $mm; $m++) {
            for ($n = 1; $n < $nn; $n++) {
                if ($strs[$n][$m] < $strs[$n-1][$m]) {
                    $count++;
                    break;
                }
            }
        }
        return $count;
    }
}

/**
 * 执行用时：48 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.6 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：85 / 85
 */