<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/14 0:01
 * Des: 1672. 最富有客户的资产总量
 *      https://leetcode-cn.com/problems/richest-customer-wealth/
 *      给你一个 m x n 的整数网格 accounts ，其中 accounts[i][j] 是第 i 位客户在第 j 家银行托管的资产数量。返回最富有客户所拥有的 资产总量 。
 *      客户的 资产总量 就是他们在各家银行托管的资产数量之和。最富有客户就是 资产总量 最大的客户。
 */

class Solution
{

    /**
     * @param Integer[][] $accounts
     * @return Integer
     */
    function maximumWealth($accounts)
    {
        $max = -1;
        foreach ($accounts as $account) {
            $sum = array_sum($account);
            if ($sum > $max) {
                $max = $sum;
            }
        }
        return $max;
    }
}

var_dump((new Solution())->maximumWealth([[1, 2, 3], [3, 2, 1]]));
var_dump((new Solution())->maximumWealth([[1, 5], [7, 3], [3, 5]]));

/*
执行用时：12 ms, 在所有 PHP 提交中击败了86.36% 的用户
内存消耗：19.4 MB, 在所有 PHP 提交中击败了31.82% 的用户
通过测试用例：34 / 34
 */