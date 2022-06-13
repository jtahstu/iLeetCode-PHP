<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/12 10:26
 * Des: 5259. 计算应缴税款总额
 *      https://leetcode.cn/problems/calculate-amount-paid-in-taxes/
 *      给你一个下标从 0 开始的二维整数数组 brackets ，其中 brackets[i] = [upperi, percenti] ，表示第 i 个税级的上限是 upperi ，征收的税率为 percenti 。税级按上限 从低到高排序（在满足 0 < i < brackets.length 的前提下，upperi-1 < upperi）。
 *      税款计算方式如下：
 *          不超过 upper0 的收入按税率 percent0 缴纳
 *          接着 upper1 - upper0 的部分按税率 percent1 缴纳
 *          然后 upper2 - upper1 的部分按税率 percent2 缴纳
 *          以此类推
 *      给你一个整数 income 表示你的总收入。返回你需要缴纳的税款总额。与标准答案误差不超 10-5 的结果将被视作正确答案。
 */

class Solution
{

    /**
     * @param Integer[][] $brackets
     * @param Integer $income
     * @return Float
     */
    function calculateTax($brackets, $income)
    {
        $res = 0;
        $count = count($brackets);
        $brackets[-1][0] = 0;
        for ($i = 0; $i < $count; $i++) {
            if ($income >= $brackets[$i][0]) {
                $res += ($brackets[$i][0] - $brackets[$i-1][0]) * $brackets[$i][1] / 100;
            } else {
                $res += ($income- $brackets[$i-1][0]) * $brackets[$i][1] / 100;
                break;
            }
//            $income -= $brackets[$i][0];
        }
        return $res;
    }
}