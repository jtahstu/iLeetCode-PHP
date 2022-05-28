<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 15:42
 * Des: 剑指 Offer 66. 构建乘积数组
 *      https://leetcode.cn/problems/gou-jian-cheng-ji-shu-zu-lcof/
 *      给定一个数组 A[0,1,…,n-1]，请构建一个数组 B[0,1,…,n-1]，其中 B[i] 的值是数组 A 中除了下标 i 以外的元素的积, 即 B[i]=A[0]×A[1]×…×A[i-1]×A[i+1]×…×A[n-1]。不能使用除法。
 */

class Solution
{

    /**
     * @param Integer[] $a
     * @return Integer[]
     */
    function constructArr($a)
    {
        $n = count($a);
        $multi1[-1] = 1;    //正序的前缀积
        $multi2[$n] = 1;    //倒序的前缀积
        for ($i = $n - 1; $i >= 0; $i--) {
            $multi2[$i] = $multi2[$i + 1] * $a[$i];
        }
        $res = [$multi2[1]];
        for ($i = 0; $i < $n; $i++) {
            $multi1[$i] = $multi1[$i - 1] * $a[$i];
            $res[$i] = $multi2[$i + 1] * $multi1[$i - 1];
        }
        return $res;
    }
}

/**
 * 执行用时：56 ms, 在所有 PHP 提交中击败了81.82%的用户
 * 内存消耗：34.9 MB, 在所有 PHP 提交中击败了9.09%的用户
 * 通过测试用例：44 / 44
 */