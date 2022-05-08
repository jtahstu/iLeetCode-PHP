<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/8 10:36
 * Des: todo list
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


    public $items = 0;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function averageOfSubtree($root)
    {
        $this->dfs($root);
        return $this->items;
    }

    function dfs($root)
    {
        if ($root == null)
            return [0, 0];
        $l = $this->dfs($root->left);
        $r = $this->dfs($root->right);
        $val = $l[0] + $r[0] + $root->val;
        $nodes = $l[1] + $r[1] + 1;
        if ($root->val == floor($val / $nodes)) {
            $this->items++;
        }
        return [$val, $nodes];
    }
}