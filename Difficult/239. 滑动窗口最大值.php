<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/3 19:22
 * Des: 239. 滑动窗口最大值
 *      https://leetcode.cn/problems/sliding-window-maximum/
 *      给你一个整数数组 nums，有一个大小为 k 的滑动窗口从数组的最左侧移动到数组的最右侧。你只可以看到在滑动窗口内的 k 个数字。滑动窗口每次只向右移动一位。
 *      返回 滑动窗口中的最大值数组 。
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function maxSlidingWindow($nums, $k) {
        $queue = new SplQueue();
        $ans = [];
        $n = count($nums);
        for ($i = 0; $i < $n; $i++) {
            while (!$queue->isEmpty() && $nums[$i] >= $nums[$queue->top()]) {
                $queue->pop();
            }
            $queue->enqueue($i);
            while ($i - $k >= 0 && $queue->bottom() <= $i - $k) $queue->dequeue();
            if ($i >= $k - 1) $ans[] = $nums[$queue->bottom()];
        }
        return $ans;
    }
}

/**
 * 队列记录的是下标, 且下标对应的值是从大到小的
 * 遍历给定数组中的元素，如果队列不为空且当前考察元素大于等于队尾元素，则将队尾元素移除。直到，队列为空或当前考察元素小于新的队尾元素；
 * 当队首元素的下标小于滑动窗口左侧边界left时，表示队首元素已经不再滑动窗口内，因此将其从队首移除, 可能多个。
 * 由于数组下标从0开始，因此当窗口右边界i大于等于窗口大小k-1时，意味着窗口形成。此时，队首元素就是该窗口内的最大值。
 * 作者：hardcore-aryabhata, 链接：https://leetcode.cn/problems/sliding-window-maximum/solution/dong-hua-yan-shi-dan-diao-dui-lie-239hua-hc5u/
 *
 * 执行用时：500 ms, 在所有 PHP 提交中击败了80.65%的用户
 * 内存消耗：37.9 MB, 在所有 PHP 提交中击败了19.35%的用户
 * 通过测试用例：50 / 50
 */