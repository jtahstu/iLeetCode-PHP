<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/19 21:11
 * Des: 508. 出现次数最多的子树元素和
 *      https://leetcode.cn/problems/most-frequent-subtree-sum/
 *      给你一个二叉树的根结点 root ，请返回出现次数最多的子树元素和。如果有多个元素出现的次数相同，返回所有出现次数最多的子树元素和（不限顺序）。
 *      一个结点的 「子树元素和」 定义为以该结点为根的二叉树上所有结点的元素之和（包括结点本身）。
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    public $list = [];

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function findFrequentTreeSum($root)
    {
        $this->dfs($root);
        // print_r($this->list);
        $map = [];
        $max = -1;
        $res = [];
        foreach ($this->list as $val) {
            $map[$val] = isset($map[$val]) ? $map[$val] + 1 : 1;
            if ($map[$val] == $max) $res[] = $val;
            if ($map[$val] > $max) {
                $max = $map[$val];
                $res = [$val];
            }
        }
        return $res;
    }

    function dfs($root)
    {
        if (!$root) return 0;
        $sum = $this->dfs($root->left) + $this->dfs($root->right) + $root->val;
        $this->list[] = $sum;
        return $sum;
    }
}

/**
 * 主要就是算出每个子树的元素和, 然后就是简单统计了
 *
 * 执行用时：16 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：22 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：58 / 58
 */