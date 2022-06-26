<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/26 18:53
 * Des: 710. 黑名单中的随机数
 *      https://leetcode.cn/problems/random-pick-with-blacklist/
 *      给定一个整数 n 和一个 无重复 黑名单整数数组 blacklist 。设计一种算法，从 [0, n - 1] 范围内的任意整数中选取一个 未加入 黑名单 blacklist 的整数。任何在上述范围内且不在黑名单 blacklist 中的整数都应该有 同等的可能性 被返回。
 *      优化你的算法，使它最小化调用语言 内置 随机函数的次数。
 *      实现 Solution 类:
 *          Solution(int n, int[] blacklist) 初始化整数 n 和被加入黑名单 blacklist 的整数
 *          int pick() 返回一个范围为 [0, n - 1] 且不在黑名单 blacklist 中的随机整数
 */

class Solution
{
    public $mid = 0;
    public $map = [];

    /**
     * @param Integer $n
     * @param Integer[] $blacklist
     */
    function __construct($n, $blacklist)
    {
        $this->n = $n;
        $bl_count = count($blacklist);
        $mid = $this->n - $bl_count;
        $this->mid = $mid;
        $bl_right_bai = array_diff(range($mid, $this->n - 1), $blacklist);
        foreach ($blacklist as $v) {
            if ($v < $mid) $bl_left_hei[] = $v;
        }
//        $bl_left_hei = array_intersect(range(0, $mid - 1), $blacklist);   //由于n可能非常大, range(0, $mid)会爆内存
        foreach ($bl_left_hei as $hv) {
            $bv = array_pop($bl_right_bai);
            $map[$hv] = $bv;
        }
        $this->map = $map;
    }

    /**
     * @return Integer
     */
    function pick()
    {
        $val = rand(0, $this->mid - 1);
        if (isset($this->map[$val])) $val = $this->map[$val];
        return $val;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($n, $blacklist);
 * $ret_1 = $obj->pick();
 */

/**
 * 哈希映射, 然后随机
 * 执行用时：132 ms, 在所有 PHP 提交中击败了40.00%的用户
 * 内存消耗：30.2 MB, 在所有 PHP 提交中击败了60.00%的用户
 * 通过测试用例：68 / 68
 */