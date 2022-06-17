<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/17 10:04
 * Desc: 1089. 复写零
 *       https://leetcode.cn/problems/duplicate-zeros/
 *       给你一个长度固定的整数数组 arr，请你将该数组中出现的每个零都复写一遍，并将其余的元素向右平移。
 *       注意：请不要在超过该数组长度的位置写入元素。
 *       要求：请对输入的数组 就地 进行上述修改，不要从函数返回任何东西。
 */

class Solution
{

    /**
     * @param Integer[] $arr
     * @return NULL
     */
    function duplicateZeros(&$arr)
    {
        $arr2 = $arr;
        $l1 = $l2 = 0;
        $n = count($arr);
        while ($l1 < $n) {
            $arr[$l1] = $arr2[$l2];
            if ($arr2[$l2] == 0) {
                $l1++;
                if ($l1 == $n) break; //一开始这里少了个判断
                $arr[$l1] = 0;
            }
            $l1++;
            $l2++;
        }
    }
}

/**
 * 执行用时：12 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.8 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：30 / 30
 */