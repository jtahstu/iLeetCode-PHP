<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/11 0:10
 * Des: 449. 序列化和反序列化二叉搜索树
 *      https://leetcode.cn/problems/serialize-and-deserialize-bst/
 *      设计一个算法来序列化和反序列化 二叉搜索树 。 对序列化/反序列化算法的工作方式没有限制。 您只需确保二叉搜索树可以序列化为字符串，并且可以将该字符串反序列化为最初的二叉搜索树。
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


class Codec
{
    public $items = [];

    function __construct()
    {

    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root)
    {
        $this->dfs($root);
        return implode(',', $this->items);
    }

    function dfs($root)
    {
        if ($root == null) {
            return;
        }
        $this->items[] = $root->val;
        $this->dfs($root->left);
        $this->dfs($root->right);
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data)
    {
        $items = explode(',', $data);
        if (!$items) {
            return new TreeNode(null);
        }
        $root = new TreeNode($items[0]);
        for ($i = 1; $i < count($items); $i++) {
            $this->insert($root, $items[$i]);
        }
        return $root;
    }

    function insert(&$root, $val)
    {
        if ($val < $root->val) {
            if ($root->left == null) {
                $root->left = new TreeNode($val);
            } else {
                $this->insert($root->left, $val);
            }
        } else {
            if ($root->right == null) {
                $root->right = new TreeNode($val);
            } else {
                $this->insert($root->right, $val);
            }
        }
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $ser = new Codec();
 * $tree = $ser->serialize($param_1);
 * $deser = new Codec();
 * $ret = $deser->deserialize($tree);
 * return $ret;
 */

//object(TreeNode)#8 (3) {
//["val"]=>
//  string(1) "2"
//["left"]=>
//  object(TreeNode)#9 (3) {
//  ["val"]=>
//    string(1) "1"
//["left"]=>
//    NULL
//    ["right"]=>
//    NULL
//  }
//  ["right"]=>
//  object(TreeNode)#10 (3) {
//  ["val"]=>
//    string(1) "3"
//["left"]=>
//    NULL
//    ["right"]=>
//    NULL
//  }
//}

/**
 * 执行用时：60 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：27.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：62 / 62
 */

$deser = new Codec();
$ret = $deser->deserialize('7,5,10,4,6,9,11');

$tree = $deser->serialize($ret);
print_r($tree);
print_r($ret);