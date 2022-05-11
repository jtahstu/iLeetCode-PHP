<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/11 18:24
 * Des: 剑指 Offer 32 - III. 从上到下打印二叉树 III
 *      https://leetcode.cn/problems/cong-shang-dao-xia-da-yin-er-cha-shu-iii-lcof/
 *      请实现一个函数按照之字形顺序打印二叉树，即第一行按照从左到右的顺序打印，第二层按照从右到左的顺序打印，第三行再按照从左到右的顺序打印，其他行以此类推。
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
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
        if (!$root) {
            return [];
        }
        $items = [];
        $nodes = [[1, $root]];
        while ($nodes) {        //层序遍历
            list($l, $node) = array_shift($nodes);
            $items[$l][] = $node->val;
            $l++;
            if ($node->left !== null) {
                $nodes[] = [$l, $node->left];
            }
            if ($node->right !== null) {
                $nodes[] = [$l, $node->right];
            }
        }
        $res = [];
        foreach ($items as $l => $value) {
            if (!($l & 1)) {
                $res[] = array_reverse($value);
            } else {
                $res[] = $value;
            }
        }
        return $res;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了62.96%的用户
 * 内存消耗：19.6 MB, 在所有 PHP 提交中击败了7.41%的用户
 * 通过测试用例：34 / 34
 */

//也可在偶数行, 方向遍历$nodes数组, 然后加到结果集里