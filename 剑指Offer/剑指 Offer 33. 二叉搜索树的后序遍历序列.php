<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/25 15:56
 * Des: 剑指 Offer 33. 二叉搜索树的后序遍历序列
 *      https://leetcode.cn/problems/er-cha-sou-suo-shu-de-hou-xu-bian-li-xu-lie-lcof/
 *      输入一个整数数组，判断该数组是不是某二叉搜索树的后序遍历结果。如果是则返回 true，否则返回 false。假设输入的数组的任意两个数字都互不相同。
 */

class Solution
{

    /**
     * @param Integer[] $postorder
     * @return Boolean
     */
    function verifyPostorder($postorder)
    {
        return $this->verify($postorder, 0, count($postorder) - 1);
    }

    function verify($postorder, $l, $r)
    {
        if ($l >= $r) return true;
        $x = $l;
        while ($postorder[$x] < $postorder[$r]) $x++;
        //记录分割点
        $y = $x;
        while ($postorder[$x] > $postorder[$r]) $x++;
        $left = $this->verify($postorder, $l, $y - 1);
        $right = $this->verify($postorder, $y, $r - 1);
        return $x == $r && $left && $right;
    }
}

/**
 * 执行用时：4 ms, 在所有 PHP 提交中击败了88.89%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了11.11%的用户
 * 通过测试用例：23 / 23
 */