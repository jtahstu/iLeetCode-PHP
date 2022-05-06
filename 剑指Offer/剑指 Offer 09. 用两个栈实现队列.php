<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/6 16:38
 * Des: 剑指 Offer 09. 用两个栈实现队列
 *      https://leetcode.cn/problems/yong-liang-ge-zhan-shi-xian-dui-lie-lcof/
 */

class CQueue1
{

    private $queue = [];

    /**
     */
    function __construct()
    {
        $this->queue = [];
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value)
    {
        $this->queue[] = $value;
    }

    /**
     * @return Integer
     */
    function deleteHead()
    {
        if (!$this->queue) {
            return -1;
        }
        return array_shift($this->queue);
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */

/**
 * 执行用时：260 ms, 在所有 PHP 提交中击败了56.31%的用户
 * 内存消耗：26 MB, 在所有 PHP 提交中击败了41.75%的用户
 * 通过测试用例：55 / 55
 */
class CQueue
{
    private $queue1 = [];
    private $queue2 = [];

    /**
     */
    function __construct()
    {
        $this->queue1 = $this->queue1 = [];
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value)
    {
        $this->queue1[] = $value;
    }

    /**
     * @return Integer
     */
    function deleteHead()
    {
        if (!$this->queue1 && !$this->queue2) {
            return -1;
        }
        if (!$this->queue2) {
            while ($this->queue1) {
                $this->queue2[] = array_pop($this->queue1);
            }
        }
        return array_pop($this->queue2);
    }
}

/**
 * 我只能说还是array_shift好用啊
 * 执行用时：304 ms, 在所有 PHP 提交中击败了20.39%的用户
 * 内存消耗：26.3 MB, 在所有 PHP 提交中击败了24.27%的用户
 * 通过测试用例：55 / 55
 */