<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/8 09:57
 * Desc: 1217. 玩筹码
 *      https://leetcode.cn/problems/minimum-cost-to-move-chips-to-the-same-position/
 *      有 n 个筹码。第 i 个筹码的位置是 position[i] 。
 *      我们需要把所有筹码移到同一个位置。在一步中，我们可以将第 i 个筹码的位置从 position[i] 改变为:
 *          position[i] + 2 或 position[i] - 2 ，此时 cost = 0
 *          position[i] + 1 或 position[i] - 1 ，此时 cost = 1
 *      返回将所有筹码移动到同一位置上所需要的 最小代价 。
 */

class Solution
{

    /**
     * @param Integer[] $position
     * @return Integer
     */
    function minCostToMoveChips($position)
    {
        $j = 0;
        foreach ($position as $p) {
            if ($p & 1) $j++;
        }
        $o = count($position) - $j;
        return $j >= $o ? $o : $j;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：51 / 51
 */