<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/3 19:32
 * Des: 剑指 Offer 59 - II. 队列的最大值
 *      https://leetcode.cn/problems/dui-lie-de-zui-da-zhi-lcof/
 *      请定义一个队列并实现函数 max_value 得到队列里的最大值，要求函数max_value、push_back 和 pop_front 的均摊时间复杂度都是O(1)。
 *      若队列为空，pop_front 和 max_value 需要返回 -1
 */

class MaxQueue
{
    public $queue = null;
    public $nums = [];

    /**
     */
    function __construct()
    {
        $this->queue = new SplQueue();
    }

    /**
     * @return Integer
     */
    function max_value()
    {
        if ($this->queue->isEmpty()) return -1;
        return $this->queue->bottom();
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function push_back($value)
    {
        while (!$this->queue->isEmpty() && $value >= $this->queue->top()) {
            $this->queue->pop();
        }
        $this->queue->enqueue($value);
        $this->nums[] = $value;
    }

    /**
     * @return Integer
     */
    function pop_front()
    {
        if (!$this->nums) return -1;
        $v = array_shift($this->nums);
        if ($this->queue->bottom() == $v) { //注意2个队列都要维护
            $this->queue->shift();
        }
        return $v;
    }
}

/**
 * Your MaxQueue object will be instantiated and called as such:
 * $obj = MaxQueue();
 * $ret_1 = $obj->max_value();
 * $obj->push_back($value);
 * $ret_3 = $obj->pop_front();
 *
 * 思路同上一题, 就是把$k当成1, 也不用管左窗口的问题了
 * 执行用时：104 ms, 在所有 PHP 提交中击败了91.67%的用户
 * 内存消耗：24.5 MB, 在所有 PHP 提交中击败了66.67%的用户
 * 通过测试用例：34 / 34
 */