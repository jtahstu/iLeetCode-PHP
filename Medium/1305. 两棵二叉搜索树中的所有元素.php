<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/1 23:00
 * Des: 1305. 两棵二叉搜索树中的所有元素
 *      https://leetcode-cn.com/problems/all-elements-in-two-binary-search-trees/
 *      给你 root1 和 root2 这两棵二叉搜索树。请你返回一个列表，其中包含 两棵树 中的所有整数并按 升序 排序。
 */


//Definition for a binary tree node.
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{

    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return Integer[]
     */
    function getAllElements($root1, $root2)
    {
        $ans = $l1 = $l2 = [];
        $this->dfs($root1, $l1);
        $this->dfs($root2, $l2);
        $i = $j = 0;
        $len1 = count($l1);
        $len2 = count($l2);
        while ($i < $len1 || $j < $len2) {
            $a = $i < $len1 ? $l1[$i] : PHP_INT_MAX;
            $b = $j < $len2 ? $l2[$j] : PHP_INT_MAX;
            if ($a <= $b) {
                $ans[] = $a;
                $i++;
            } else {
                $ans[] = $b;
                $j++;
            }
        }
        return $ans;
    }

    function dfs($root, &$list)
    {
        if ($root == null)
            return;
        $this->dfs($root->left, $list);
        $list[] = $root->val;
        $this->dfs($root->right, $list);
    }
}

/**
 * 执行用时：104 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：23.6 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：48 / 48
 */