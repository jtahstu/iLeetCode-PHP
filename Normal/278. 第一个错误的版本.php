<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/26 16:15
 * Des: 278. 第一个错误的版本
 *      https://leetcode.cn/problems/first-bad-version/
 */

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */

class Solution extends VersionControl
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n)
    {
        $left = 1;
        $right = $n;
        while ($left < $right) {
            $mid = $left + (($right - $left) >> 1);
            if ($this->isBadVersion($mid)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        return $left;
    }
}

/**
 * 解题思路：二分查找
 *    如果mid是bad version，那么mid+1一定是bad version，所以只需要查找mid+1即可
 *    如果mid不是bad version，那么mid一定不是bad version，所以只需要查找mid即可
 * 执行用时：20 ms, 在所有 PHP 提交中击败了94.97%的用户
 * 内存消耗：18.5 MB, 在所有 PHP 提交中击败了83.80%的用户
 * 通过测试用例：22 / 22
 */