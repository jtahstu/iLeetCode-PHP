<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/12 15:38
 * Des: 剑指 Offer 26. 树的子结构
 *      https://leetcode.cn/problems/shu-de-zi-jie-gou-lcof/
 *      输入两棵二叉树A和B，判断B是不是A的子结构。(约定空树不是任意一个树的子结构)
 */


//Definition for a binary tree node.
class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($value)
    {
        $this->val = $value;
    }
}

class Solution
{

    /**
     * @param TreeNode $A
     * @param TreeNode $B
     * @return Boolean
     */
    function isSubStructure($A, $B)
    {
        if (!$A || !$B) {
            return false;
        }
        $res = false;
        if ($A->val == $B->val) {
            $res = $this->isSubTree($A, $B);
        }
        if (!$res) {
            $res = $this->isSubStructure($A->left, $B);
        }
        if (!$res) {
            $res = $this->isSubStructure($A->right, $B);
        }
        return $res;
    }

    function isSubTree($a, $b)
    {
        if (!$b) return true;
        if (!$a) return false;
        if ($a->val !== $b->val) return false;
        return $this->isSubTree($a->left, $b->left) && $this->isSubTree($a->right, $b->right);
    }

    /**
     * @param TreeNode $A
     * @param TreeNode $B
     * @return Boolean
     */
    function isSubStructure4($A, $B)
    {
        if (!$A || !$B) {
            return false;
        }
        $items_a_arr = $items_a = [];
        $nodes = [$A];
        while ($nodes) {        //层序遍历
            $node = array_shift($nodes);
            $items_a[] = $node->val;
            $items_a_arr[] = $items_a;
            if ($node->left !== null) {
                $nodes[] = $node->left;
            }
            if ($node->right !== null) {
                $nodes[] = $node->right;
            }
        }
        $nodes = [$B];
        $items_b = [];
        while ($nodes) {        //层序遍历
            $node = array_shift($nodes);
            $items_b[] = $node->val;
            if ($node->left !== null) {
                $nodes[] = $node->left;
            }
            if ($node->right !== null) {
                $nodes[] = $node->right;
            }
        }
        echo json_encode($items_a_arr) . PHP_EOL;
        return in_array($items_b, $items_a_arr);
    }

    public $z_items = [];

    function isSubStructure3($A, $B)
    {
        if (!$A || !$B) {
            return false;
        }
        $items_a = $items_b = [];
        $this->dfs($A, $items_a);
        $this->dfs($B, $items_b);
        print_r($this->z_items);
        return in_array($items_b, $this->z_items);
    }

    function dfs($root, &$items)
    {
        if ($root == null) {
            return;
        }
        $items[] = $root->val;
        $this->z_items[] = $items;
        $this->dfs($root->left, $items);
        $this->dfs($root->right, $items);
    }

    //如果A, B是层序遍历的数组, 那么先构造树, 然后先序遍历
    function isSubStructure2($A, $B)
    {
        $root_a = $this->buildTree($A);
        $root_b = $this->buildTree($B);
//        var_dump($root_a);
//        var_dump($root_b);
        $items_a = $items_b = [];
        $this->dfs($root_a, $items_a);
        $this->dfs($root_b, $items_b);
        echo implode(" ", $items_a) . PHP_EOL;
        echo implode(" ", $items_b) . PHP_EOL;
        $count_a = count($items_a);
        $count_b = count($items_b);
        for ($i = 0; $i <= $count_a - $count_b; $i++) {
            if (array_slice($items_a, $i, $count_b) == $items_b) {
                return true;
            }
        }
        return false;
    }

    function buildTree($items)
    {
        if (!$items) {
            return null;
        }
        $tree = new TreeNode($items[0]);
        $nodes = [$tree];
        array_shift($items);
        while ($nodes && $items) {
            $curr = &$nodes[0];
            array_shift($nodes);
            $l = array_shift($items);
            $curr->left = new TreeNode($l);
            $nodes[] = $curr->left;
            $r = array_shift($items);
            if ($r) {
                $curr->right = new TreeNode($r);
                $nodes[] = $curr->right;
            }
        }
        return $tree;
    }
}

var_dump((new Solution)->isSubStructure2([3, 4, 5, 1, 2], [4, 1]));
var_dump((new Solution)->isSubStructure2([1, 2, 3], [3, 1]));
var_dump((new Solution)->isSubStructure2([1, 2, 4, 3], [3]));
var_dump((new Solution)->isSubStructure2([10, 12, 6, 8, 3, 11], [10, 12, 6, 8]));


/**
 * 执行用时：20 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：22.6 MB, 在所有 PHP 提交中击败了37.04%的用户
 * 通过测试用例：48 / 48
 */
