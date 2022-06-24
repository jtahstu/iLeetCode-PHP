<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/24 10:16
 * Desc: 515. 在每个树行中找最大值
 *      https://leetcode.cn/problems/find-largest-value-in-each-tree-row/
 *      给定一棵二叉树的根节点 root ，请找出该二叉树中每一层的最大值。
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
     * @return Integer[]
     */
    function largestValues($root)
    {
        $items = [$root];
        $res = [];
        while ($items) {
            $nodes = [];
            $list = [];
            foreach ($items as $item) {
                $list[] = $item->val;
                if ($item->left) $nodes[] = $item->left;
                if ($item->right) $nodes[] = $item->right;
            }
            $res[] = max($list);
            $items = $nodes;
        }
        return $res;
    }
}

/**
 * 执行用时：16 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：21.1 MB, 在所有 PHP 提交中击败了37.50%的用户
 * 通过测试用例：78 / 78
 */