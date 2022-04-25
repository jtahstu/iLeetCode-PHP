<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/22 10:20
 * Des: 396. 旋转函数
 *      https://leetcode-cn.com/problems/rotate-function/
 *      给定一个长度为 n 的整数数组 nums 。
 * 假设 arrk 是数组 nums 顺时针旋转 k 个位置后的数组，我们定义 nums 的 旋转函数  F 为：
 * F(k) = 0 * arrk[0] + 1 * arrk[1] + ... + (n - 1) * arrk[n - 1]
 * 返回 F(0), F(1), ..., F(n-1)中的最大值 。
 * 生成的测试用例让答案符合 32 位 整数。
 */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     * F_{k+1}-F_{k} = a_{n-k} + a_{n-k+1} +...+ a_{n-k-3}+ a_{n-k-2}-a_{n-k-1}=sum(A)-n*a_{n-k-1}
     */
    function maxRotateFunction($nums)
    {
        $count = count($nums);
        $sum = array_sum($nums);
        $f = 0;
        for ($i = 0; $i < $count; $i++) {
            $f += $i * $nums[$i];
        }
        $max = $f;
        for ($i = 0; $i < $count; $i++) {
            $f = $f + $sum - $count * $nums[$count - $i - 1];
            $max = max($max, $f);
        }
        return $max;
    }

    /**
     * 常规写法会超时
     * @param Integer[] $nums
     * @return Integer
     */
    function maxRotateFunction超时($nums)
    {
        if (count($nums) == 0) {
            return 0;
        }
        $count = count($nums);
        $max = PHP_INT_MIN;
        for ($i = 0; $i < $count; $i++) {
            $index = $res = 0;
            for ($j = $i; $j < $count; $j++) {
                $res += $index * $nums[$j];
                $index++;
            }
            for ($j = 0; $j < $i; $j++) {
                $res += $index * $nums[$j];
                $index++;
            }
            $max = max($max, $res);
//            echo "$res ";
        }
//        echo PHP_EOL;
        return $max;
    }
}

var_dump((new Solution())->maxRotateFunction([4, 3, 2, 6]));
var_dump((new Solution())->maxRotateFunction([100]));

/**
 * 执行用时：288 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：31 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：58 / 58
 */