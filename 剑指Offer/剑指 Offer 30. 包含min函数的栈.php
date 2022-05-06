<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/6 16:43
 * Des: 剑指 Offer 30. 包含min函数的栈
 *      https://leetcode.cn/problems/bao-han-minhan-shu-de-zhan-lcof/
 *      定义栈的数据结构，请在该类型中实现一个能够得到栈的最小元素的 min 函数在该栈中，调用 min、push 及 pop 的时间复杂度都是 O(1)。
 */

class MinStack
{

    private $stack = [];
    private $stack_min = [];

    /**
     * initialize your data structure here.
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
        $this->stack[] = $x;
        $stack_min_top = $this->stack_min ? $this->stack_min[count($this->stack_min) - 1] : PHP_INT_MAX;
        if ($x < $stack_min_top) {
            $this->stack_min[] = $x;
        } else {
            $this->stack_min[] = $stack_min_top;
        }
    }


    //下面这些方法应该都要判断栈是否有值的, 不然就Notice警告了
    //只是oj都是合法的取数据, 就没报错而已

    /**
     * @return NULL
     */
    function pop()
    {
        array_pop($this->stack_min);
        array_pop($this->stack);
    }

    /**
     * @return Integer
     */
    function top()
    {
        return $this->stack[count($this->stack) - 1]; //或者用end()方法
    }

    /**
     * @return Integer
     */
    function min()
    {
        return $this->stack_min[count($this->stack_min) - 1];  //或者用end()方法
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->min();
 */

/**
 * 需要同时维护个最小值的栈, 用来更快的获取最小值
 * 执行用时：20 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：25.5 MB, 在所有 PHP 提交中击败了9.72%的用户
 * 通过测试用例：19 / 19
 *
 * 我的评价是不如直接return min($this->stack); 这样就是会慢不少
 */