<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/17 23:06
 * Des: 173. 二叉搜索树迭代器
 *      https://leetcode.cn/problems/binary-search-tree-iterator/
 *      剑指 Offer II 055. 二叉搜索树迭代器
 *      https://leetcode.cn/problems/kTOapQ/
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
class BSTIterator {
    public $items = [];
    /**
     * @param TreeNode $root
     */
    function __construct($root) {
        $this->dfs($root);
        print_r($this->items);
    }

    function dfs($root) {
        if($root==null) return;
        $this->dfs($root->left);
        $this->items[] = $root->val;
        $this->dfs($root->right);
    }

    /**
     * @return Integer
     */
    function next() {
        return $this->items ? array_shift($this->items) : null;
    }

    /**
     * @return Boolean
     */
    function hasNext() {
        return !empty($this->items);
    }
}

/**
 * Your BSTIterator object will be instantiated and called as such:
 * $obj = BSTIterator($root);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */

/**
 * 就是中序遍历, 然后输出
 * 执行用时：104 ms, 在所有 PHP 提交中击败了37.50%的用户
 * 内存消耗：25.5 MB, 在所有 PHP 提交中击败了25.00%的用户
 * 通过测试用例：61 / 61
 */