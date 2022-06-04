<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 1:14
 * Des: 478. 在圆内随机生成点
 *      https://leetcode.cn/problems/generate-random-point-in-a-circle/
 *      给定圆的半径和圆心的位置，实现函数 randPoint ，在圆中产生均匀随机点。
 */

class Solution
{

    public $radius = 0;
    public $x = 0;
    public $y = 0;

    /**
     * @param Float $radius
     * @param Float $x_center
     * @param Float $y_center
     */
    function __construct($radius, $x_center, $y_center)
    {
        $this->radius = $radius;
        $this->x = $x_center;
        $this->y = $y_center;
    }

    /**
     * @return Float[]
     */
    function randPoint()
    {
        $x_flag = rand(0, 1) == 0 ? -1 : 1;
        $y_flag = rand(0, 1) == 0 ? -1 : 1;
        $x = rand(0, 100000) / 100000 * $this->radius;
        $y = rand(0, 100000) / 100000 * $this->radius;
        if (($x * $x + $y * $y) > $this->radius * $this->radius) {
            return $this->randPoint();
        }
        return [$this->x + $x_flag * $x, $this->y + $y_flag * $y];
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($radius, $x_center, $y_center);
 * $ret_1 = $obj->randPoint();
 */

/**
 * 直接随机圆的外接正方形, 然后勾股定律超过圆的就重来
 * 执行用时：64 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：27.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：8 / 8
 */