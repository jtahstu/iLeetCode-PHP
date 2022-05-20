<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/20 16:20
 * Des: 剑指 Offer 54. 二叉搜索树的第k大节点
 *      https://leetcode.cn/problems/er-cha-sou-suo-shu-de-di-kda-jie-dian-lcof/
 *      给定一棵二叉搜索树，请找出其中第 k 大的节点的值。
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

    public $count = 0;  //当前已遍历节点数
    public $res = null;
    public $k = 0;
//    public $items = [];

    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Integer
     */
    function kthLargest($root, $k)
    {
        $this->k = $k;
        $this->dfs($root);
//        print_r($this->items);
        return $this->res;
    }

    function dfs($root)
    {
        if ($root == null) return;
        $this->count++;
        if ($this->count == $this->k) {
            $this->res = $root->val;
            return;
        }
        $this->dfs($root->right);
//        $this->items[] = $root->val;
        $this->dfs($root->left);
    }
}

/**
 * 没啥技巧, 二叉搜索树中序遍历是个升序数组, 但是先递归right再left, 就是个倒序数组, 那么算节点数count就是第k大的值
 * 执行用时：20 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：21.9 MB, 在所有 PHP 提交中击败了58.33%的用户
 * 通过测试用例：91 / 91
 */