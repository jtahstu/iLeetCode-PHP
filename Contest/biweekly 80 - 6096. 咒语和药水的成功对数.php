<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/11 22:28
 * Des: 6096. 咒语和药水的成功对数
 *      https://leetcode.cn/problems/successful-pairs-of-spells-and-potions/
 *      给你两个正整数数组 spells 和 potions ，长度分别为 n 和 m ，其中 spells[i] 表示第 i 个咒语的能量强度，potions[j] 表示第 j 瓶药水的能量强度。
 *      同时给你一个整数 success 。一个咒语和药水的能量强度 相乘 如果 大于等于 success ，那么它们视为一对 成功 的组合。
 *      请你返回一个长度为 n 的整数数组 pairs，其中 pairs[i] 是能跟第 i 个咒语成功组合的 药水 数目。
 */

class Solution
{

    /**
     * @param Integer[] $spells
     * @param Integer[] $potions
     * @param Integer $success
     * @return Integer[]
     */
    function successfulPairs($spells, $potions, $success)
    {
        $n = count($spells);
        $m = count($potions);
        sort($potions);
        $res = [];
        foreach ($spells as $spell) {
            $target = ceil($success / $spell);
            $i = $this->binary_search($potions, $target, $m);
            // var_dump($i);
            if ($i == $m - 1 && $potions[$i] < $target) $res[] = 0;
            else $res[] = $m - $i;
        }
        return $res;
    }

    function binary_search(&$nums, $target, $n)
    {
        $l = 0;
        $r = $n - 1;
        while ($l <= $r) {
            $mid = intval(($l + $r) / 2);
            $v = $nums[$mid];
            if ($v >= $target) {
                $r = $mid - 1;
            }
            if ($v < $target) {
                $l = $mid + 1;
            }
        }
        return $l;
    }
}

//[15,39,38,35,33,25,31,12,40,27,29,16,22,24,7,36,29,34,24,9,11,35,21,3,33,10,9,27,35,17,14,3,35,35,39,23,35,14,31,7]
//[25,19,30,37,14,30,38,22,38,38,26,33,34,23,40,28,15,29,36,39,39,37,32,38,8,17,39,20,4,39,39,7,30,35,29,23]
//317
//[28,33,33,33,33,33,33,23,34,33,33,29,32,33,0,33,33,33,33,13,22,33,31,0,33,17,13,33,33,30,27,0,33,33,33,33,33,27,33,0]