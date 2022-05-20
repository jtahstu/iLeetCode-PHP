<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/20 9:47
 * Des: 436. 寻找右区间
 *      https://leetcode.cn/problems/find-right-interval/
 */

class Solution
{

    /**
     * @param Integer[][] $intervals
     * @return Integer[]
     */
    function findRightInterval($intervals)
    {
        $left_ps = array_column($intervals, 0);
        //先记录下左端点值对应的下标
        $index_ps = array_flip($left_ps);
        sort($left_ps);
        $res = [];
        foreach ($intervals as $interval) {
            //找到数组中>=$interval[1]的最小值
            $k = $this->binarySearch($left_ps, $interval[1]);
//            echo "$interval[1] -> $k\n";
            $res[] = $k == PHP_INT_MIN ? -1 : $index_ps[$k];
        }
        return $res;
    }

    function binarySearch(&$nums, $target)
    {
        $l = 0;
        $r = count($nums) - 1;
        if ($target < $nums[0] || $target > $nums[$r]) return PHP_INT_MIN;
        while ($l < $r) {
            $mid = $l + (($r - $l) >> 1);
            if ($nums[$mid] == $target) {
                return $target;
            } elseif ($nums[$mid] > $target) {
                $r = $mid - 1;
            } else {
                $l = $mid + 1;
            }
        }
        return $nums[$r] < $target ? $nums[$r + 1] : $nums[$r];
    }
}


//print_r((new Solution)->findRightInterval([[1,2]]));
//print_r((new Solution)->findRightInterval([[3, 4], [2, 3], [1, 2], [5, 6]]));
//print_r((new Solution)->findRightInterval([[1, 4], [2, 3], [3, 4]]));
//print_r((new Solution)->findRightInterval([[1, 12], [2, 9], [3, 10], [13, 14], [15, 16], [16, 17]]));  //[3,3,3,4,5,-1]
echo json_encode((new Solution)->findRightInterval([[-10, -8], [-9, -7], [-8, -6], [-7, -5], [-6, -4], [-5, -3], [-4, -2], [-3, -1], [-2, 0], [-1, 1], [0, 2], [1, 3], [2, 4], [3, 5], [4, 6], [5, 7], [6, 8], [7, 9], [8, 10], [9, 11], [10, 12]]));

/**
 * 执行用时：100 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：32.2 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：19 / 19
 */