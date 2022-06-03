<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/3 18:00
 * Des: 剑指 Offer 59 - I. 滑动窗口的最大值
 *      给定一个数组 nums 和滑动窗口的大小 k，请找出所有滑动窗口里的最大值。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k)
    {
        $queue = new SplQueue();
        $ans = [];
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            while (!$queue->isEmpty() && $nums[$i] >= $nums[$queue->top()]) $queue->pop();
            $queue->enqueue($i);
            while ($i - $k >= 0 && $queue->bottom() <= $i - $k) $queue->shift(); //最大值下标超过左窗口了, 就把队首弹出
            if ($i >= $k - 1) $ans[] = $nums[$queue->bottom()];
        }
        return $ans;
    }
}

print_r((new Solution)->maxSlidingWindow([1, 3, -1, -3, 5, 3, 6, 7], 3));  //[3,3,5,5,6,7]


/**
 * 队列记录的是下标, 且下标对应的值是从大到小的
 * 遍历给定数组中的元素，如果队列不为空且当前考察元素大于等于队尾元素，则将队尾元素移除。直到，队列为空或当前考察元素小于新的队尾元素；
 * 当队首元素的下标小于滑动窗口左侧边界left时，表示队首元素已经不再滑动窗口内，因此将其从队首移除, 可能多个。
 * 由于数组下标从0开始，因此当窗口右边界i大于等于窗口大小k-1时，意味着窗口形成。此时，队首元素就是该窗口内的最大值。
 * 作者：hardcore-aryabhata, 链接：https://leetcode.cn/problems/sliding-window-maximum/solution/dong-hua-yan-shi-dan-diao-dui-lie-239hua-hc5u/
 *
 * 执行用时：36 ms, 在所有 PHP 提交中击败了90.48%的用户
 * 内存消耗：26.7 MB, 在所有 PHP 提交中击败了14.29%的用户
 * 通过测试用例：18 / 18
 */