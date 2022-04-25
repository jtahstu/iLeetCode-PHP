<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/25 10:05
 * Des: 398. 随机数索引
 *      https://leetcode-cn.com/problems/random-pick-index/
 *      给定一个可能含有重复元素的整数数组，要求随机输出给定的数字的索引。 您可以假设给定的数字一定存在于数组中。
 * 注意：数组大小可能非常大。 使用太多额外空间的解决方案将不会通过测试。
 */

class Solution
{
    private $list;

    /**
     * @param Integer[] $nums
     */
    function __construct($nums)
    {
        foreach ($nums as $k => $num) {
            $this->list[$num][] = $k;
        }
    }

    /**
     * @param Integer $target
     * @return Integer
     */
    function pick($target)
    {
        $indexs = $this->list[$target];
        return $indexs[rand(0, count($indexs) - 1)];
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($nums);
 * $ret_1 = $obj->pick($target);
 */

$solution = new Solution([1, 2, 3, 3, 3]);
var_dump($solution->pick(3));
var_dump($solution->pick(1));

/**
 * 执行用时：116 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：39.1 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：14 / 14
 */

/*
 * 咱这属于哈希表预处理（定长数据流）
 * 另一个解法是蓄水池抽样（不定长数据流）
 * class Solution {
    Random random = new Random();
    int[] nums;
    public Solution(int[] _nums) {
        nums = _nums;
    }
    public int pick(int target) {
        int n = nums.length, ans = 0;
        for (int i = 0, cnt = 0; i < n; i++) {
            if (nums[i] == target) {
                cnt++;
                if (random.nextInt(cnt) == 0) ans = i;
            }
        }
        return ans;
    }
    }
 */