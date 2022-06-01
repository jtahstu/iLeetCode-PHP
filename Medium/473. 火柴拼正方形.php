<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/1 10:29
 * Des: 473. 火柴拼正方形
 *      https://leetcode.cn/problems/matchsticks-to-square/
 *      你将得到一个整数数组 matchsticks ，其中 matchsticks[i] 是第 i 个火柴棒的长度。你要用 所有的火柴棍 拼成一个正方形。你 不能折断 任何一根火柴棒，但你可以把它们连在一起，而且每根火柴棒必须 使用一次 。
 *      如果你能使这个正方形，则返回 true ，否则返回 false 。
 */

class Solution
{
    public $matchsticks = [];
    public $l = 0;

    /**
     * @param Integer[] $matchsticks
     * @return Boolean
     */
    function makesquare($matchsticks)
    {
        $sum = array_sum($matchsticks);
        if ($sum % 4) return false;
        $this->l = $sum / 4;
        //倒排能省掉很多次无效的尝试
        rsort($matchsticks);
        $this->matchsticks = $matchsticks;
        return $this->dfs(0, [0, 0, 0, 0]);
    }

    function dfs($i, $cur): bool
    {
        //排到最后一个了, 判断$cur数组是不都等于$l
        if ($i == count($this->matchsticks)) {
            foreach ($cur as $x) {
                if ($x != $this->l) return false;
            }
            return true;
        }
        for ($j = 0; $j < 4; $j++) {
            //每个边都尝试加上当前长度
            $val = $this->matchsticks[$i];
            if ($cur[$j] + $val > $this->l) continue;
            $cur[$j] += $val;
            if ($this->dfs($i + 1, $cur)) return true;
            $cur[$j] -= $val;
        }
        return false;
    }
}

/**
 * 执行用时：624 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：185 / 185
 */