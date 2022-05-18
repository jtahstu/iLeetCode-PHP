<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/17 23:40
 * Des: 78. 子集
 *      https://leetcode.cn/problems/subsets/
 *      剑指 Offer II 079. 所有子集
 *      https://leetcode.cn/problems/TVdhkn/
 */

class Solution
{

    public $res = [];
    public $len = 0;
    public $nums = [];

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function subsets($nums)
    {
        $this->nums = $nums;
        $this->len = count($nums);
        $this->dfs(0, []);
        return $this->res;
    }

    function dfs($i, $t)
    {
        $this->res[] = $t;
//        echo json_encode([$i,$t]).PHP_EOL;
        if ($i == $this->len) return;
        for ($j = $i; $j < $this->len; $j++) {
            $t[] = $this->nums[$j];
            $this->dfs($j + 1, $t);
            $v = array_pop($t);
//            echo "$v\n";
        }
    }

    /**
     * 执行用时：    8 ms    , 在所有 PHP 提交中击败了    66.20%    的用户
     * 内存消耗：    18.8 MB    , 在所有 PHP 提交中击败了    98.59%    的用户
     * 通过测试用例：    10 / 10
     */

    function subsets树($nums)
    {
        $this->inOrder($nums, 0, [], $res);
        return $res;
    }

    function inOrder($nums, $i, $subset, &$res)
    {
        if ($i == count($nums)) {
            $res[] = $subset;
            return;
        }
        //不选$i位置的数字
        $this->inOrder($nums, $i + 1, $subset, $res);
        $subset[] = $nums[$i];
        //选上$i位置的数字
        $this->inOrder($nums, $i + 1, $subset, $res);
    }

    /**
     * 执行用时：    8 ms    , 在所有 PHP 提交中击败了    75.00%    的用户
     * 内存消耗：    19.1 MB    , 在所有 PHP 提交中击败了    62.50%    的用户
     * 通过测试用例：    10 / 10
     */
}

//echo json_encode((new Solution)->subsets([1, 2, 3]));
echo json_encode((new Solution)->subsets树([1, 2, 3]));

//二进制和位运算就挺好, 容易理解
//回溯算法不理解的话有很懵
//按二叉树的形式选择, 来个前/中/后序遍历打印
