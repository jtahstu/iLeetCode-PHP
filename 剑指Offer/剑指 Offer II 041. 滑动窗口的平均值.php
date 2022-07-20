<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/16 23:28
 * Des: 剑指 Offer II 041. 滑动窗口的平均值
 *      https://leetcode.cn/problems/qIsx9U/
 *      给定一个整数数据流和一个窗口大小，根据该滑动窗口的大小，计算滑动窗口里所有数字的平均值。
 *      实现 MovingAverage 类：
 *          MovingAverage(int size) 用窗口大小 size 初始化对象。
 *          double next(int val) 成员函数 next 每次调用的时候都会往滑动窗口增加一个整数，请计算并返回数据流中最后 size 个值的移动平均值，即滑动窗口里所有数字的平均值。
 */

class MovingAverage
{

    public $count = 0;
    public $items = [];
    public $sum = 0;
    public $size = 0;

    /**
     * Initialize your data structure here.
     * @param Integer $size
     */
    function __construct($size)
    {
        $this->size = $size;
    }

    /**
     * @param Integer $val
     * @return Float
     */
    function next($val)
    {
        $this->items[] = $val;
        $this->sum += $val;
        $this->count++;
        if ($this->count <= $this->size) {
            return $this->sum / $this->count;
        } else {
            $del = array_unshift($this->items);
            $this->count--;
            $this->sum -= $del;
        }
        return $this->sum / $this->count;
    }
}

/**
 * Your MovingAverage object will be instantiated and called as such:
 * $obj = MovingAverage($size);
 * $ret_1 = $obj->next($val);
 */

/**
 * 比较简单, 就是避免每次都计算总和
 * 执行用时：24 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：24.7 MB, 在所有 PHP 提交中击败了80.00%的用户
 * 通过测试用例：11 / 11
 */