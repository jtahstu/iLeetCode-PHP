<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 17:27
 * Desc: 232. 用栈实现队列
 *       https://leetcode.cn/problems/implement-queue-using-stacks/
 *       请你仅使用两个栈实现先入先出队列。队列应当支持一般队列支持的所有操作（push、pop、peek、empty）：
 *       实现 MyQueue 类：
 *          void push(int x) 将元素 x 推到队列的末尾
 *          int pop() 从队列的开头移除并返回元素
 *          int peek() 返回队列开头的元素
 *          boolean empty() 如果队列为空，返回 true ；否则，返回 false
 *       说明：
 *          你 只能 使用标准的栈操作 —— 也就是只有push to top,peek/pop from top,size, 和is empty操作是合法的。
 *          你所使用的语言也许不支持栈。你可以使用 list 或者 deque（双端队列）来模拟一个栈，只要是标准的栈操作即可。
 */

class MyQueue
{

    public $stack1 = [];
    public $stack2 = [];

    /**
     */
    function __construct()
    {

    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->stack2[] = $x;
    }

    /**
     * @return Integer
     */
    function pop()
    {
        if (!$this->stack1) {
            while ($this->stack2) {
                $this->stack1[] = array_shift($this->stack2);
            }
        }
        $val = array_shift($this->stack1);
        return $val;
    }

    /**
     * @return Integer
     */
    function peek()
    {
        if (!$this->stack1) {
            while ($this->stack2) {
                $this->stack1[] = array_shift($this->stack2);
            }
        }
        return $this->stack1[0];
    }

    /**
     * @return Boolean
     */
    function empty()
    {
        return count($this->stack1) == 0 && count($this->stack2) == 0;
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */

/**
 * 栈实现队列就是要2个来倒腾
 * 看到个抖机灵, "简单题我唯唯诺诺，中等题我抓耳挠腮，困难题我直接抄袭"
 * 执行用时：8 ms, 在所有 PHP 提交中击败了63.27%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了14.29%的用户
 * 通过测试用例：22 / 22
 */