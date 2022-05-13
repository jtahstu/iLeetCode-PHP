<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/13 18:57
 * Des: 剑指 Offer 10- I. 斐波那契数列
 */

class Solution
{
    public $items = [];

    function __construct()
    {
        $mod = 1e9 + 7;
        $this->items[0] = 0;
        $this->items[1] = 1;
        for ($i = 2; $i <= 101; $i++) {
            $this->items[$i] = (($this->items[$i - 1] % $mod) + ($this->items[$i - 1] % $mod)) % $mod;
        }
    }

    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n)
    {
        print_r($this->items);
        return $this->items[$n];
    }

    function fib2($n)  //超时
    {
        $mod = 1e9 + 7;
        if (in_array($n, [0, 1])) {
            return $n;
        }
        return ($this->fib($n - 1) % $mod + $this->fib($n - 2) % $mod) % $mod;
    }
}

/**
 * 执行用时：8 ms, 在所有 PHP 提交中击败了49.23%的用户
 * 内存消耗：18.4 MB, 在所有 PHP 提交中击败了90.77%的用户
 * 通过测试用例：51 / 51
 */