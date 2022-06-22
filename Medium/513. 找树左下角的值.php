<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/22 10:15
 * Desc: 513. 找树左下角的值
 *      https://leetcode.cn/problems/find-bottom-left-tree-value/
 *      给定一个二叉树的 根节点 root，请找出该二叉树的 最底层 最左边 节点的值。
 *      假设二叉树中至少有一个节点。
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

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function findBottomLeftValue($root)
    {
        $items = [$root];
        while ($items) {
            $nodes = [];
            $list = [];
            foreach ($items as $item) {
                $list[] = $item->val;
                if ($item->left) $nodes[] = $item->left;
                if ($item->right) $nodes[] = $item->right;
            }
            if (!$nodes) return $list[0];
            else $items = $nodes;
        }
    }
}

/**
 * 2022-06-22每日一题
 * 执行用时：12 ms, 在所有 PHP 提交中击败了70.00%的用户
 * 内存消耗：21.2 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：76 / 76
 */