<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/2 23:27
 * Des: 1828. 统计一个圆中点的数目
 *      https://leetcode.cn/problems/queries-on-number-of-points-inside-a-circle/
 */

class Solution
{

    /**
     * @param Integer[][] $points
     * @param Integer[][] $queries
     * @return Integer[]
     */
    function countPoints($points, $queries)
    {
        // $ans = array_fill(0, count($queries), 0);
        // foreach ($queries as $k => $query) {
        //     foreach ($points as $point) {
        //         $l = sqrt(pow($query[0] - $point[0], 2) + pow($query[1] - $point[1], 2));
        //         if ($l <= $query[2]) {
        //             $ans[$k]++;
        //         }
        //     }
        // }
        // return $ans;

        $ans = [];
        foreach ($queries as $k => $query) {
            $ans[$k] = 0;
            foreach ($points as $point) {
                if ((($query[0] - $point[0]) * ($query[0] - $point[0]) + ($query[1] - $point[1]) * ($query[1] - $point[1])) <= $query[2] * $query[2]) {
                    $ans[$k]++;
                }
            }
        }
        return $ans;
    }
}

print_r((new Solution)->countPoints([[1, 3], [3, 3], [5, 3], [2, 2]], [[2, 3, 1], [4, 3, 1], [1, 1, 2]]));
print_r((new Solution)->countPoints([[1, 1], [2, 2], [3, 3], [4, 4], [5, 5]], [[1, 2, 2], [2, 2, 2], [4, 3, 2], [4, 3, 3]]));

/**
 * 执行用时：280 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：19.5 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：66 / 66
 *
 * 第二个写法就快一些, 内存也小了
 * 执行用时：244 ms, 在所有 PHP 提交中击败了50.00%的用户
 * 内存消耗：19.4 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：66 / 66
 */