<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/20 17:19
 * Desc: 102. 二叉树的层序遍历
 *      https://leetcode.cn/problems/binary-tree-level-order-traversal/
 *      给你二叉树的根节点 root ，返回其节点值的 层序遍历 。 （即逐层地，从左到右访问所有节点）。
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
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        $items = [$root];
        $list = [];
        if(!$root) return $list;
        while ($items) {
            $nodes = [];
            $vals = [];
            foreach ($items as $item) {
                $vals[] = $item->val;
                if ($item->left) $nodes[] = $item->left;
                if ($item->right) $nodes[] = $item->right;
            }
            $items = $nodes;
            $list[] = $vals;
        }
        return $list;
    }
}

/**
 * 执行用时：0 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：19.5 MB, 在所有 PHP 提交中击败了41.23%的用户
 * 通过测试用例：34 / 34
 */