<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/4 0:24
 * Des: 1823. 找出游戏的获胜者
 *      https://leetcode.cn/problems/find-the-winner-of-the-circular-game/
 */

class Solution
{

    /**
     * 约瑟夫环问题
     * 详细推导过程: https://zhuanlan.zhihu.com/p/121159246
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function findTheWinner($n, $k)
    {
//        return $this->f($n, $k) + 1;  //逆推
        $ans = 0;
        for ($i = 2; $i <= $n; $i++) {  //正推
            $ans = ($ans + $k) % $i;
        }
        return $ans + 1;

//        return n == 1 ? n : (findTheWinner(n - 1, m) + m - 1) % n + 1;
    }

    function f($n, $k)
    {
        if ($n == 1) {
            return 0;
        }
        return ($this->f($n - 1, $k) + $k) % $n;
    }
}

var_dump((new Solution)->findTheWinner(5, 2));
var_dump((new Solution)->findTheWinner(6, 5));

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：95 / 95
 */