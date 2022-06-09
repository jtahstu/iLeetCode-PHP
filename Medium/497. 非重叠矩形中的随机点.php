<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/9 23:02
 * Des: 497. 非重叠矩形中的随机点
 *      https://leetcode.cn/problems/random-point-in-non-overlapping-rectangles/
 *      给定一个由非重叠的轴对齐矩形的数组 rects ，其中 rects[i] = [ai, bi, xi, yi] 表示 (ai, bi) 是第 i 个矩形的左下角点，(xi, yi) 是第 i 个矩形的右上角点。设计一个算法来随机挑选一个被某一矩形覆盖的整数点。矩形周长上的点也算做是被矩形覆盖。所有满足要求的点必须等概率被返回。
 *      在给定的矩形覆盖的空间内的任何整数点都有可能被返回。
 *      请注意 ，整数点是具有整数坐标的点。
 *      实现 Solution 类:
 *          Solution(int[][] rects) 用给定的矩形数组 rects 初始化对象。
 *          int[] pick() 返回一个随机的整数点 [u, v] 在给定的矩形所覆盖的空间内。
 */

class Solution
{
    public $rects = array();
    public $count = 0;
    public $area = [];
    public $total_area = 0;

    /**
     * @param Integer[][] $rects
     */
    function __construct($rects)
    {
        $this->rects = $rects;
        $this->count = count($rects);
        for ($i = 0; $i < $this->count; $i++) {
            $area = (abs($rects[$i][0] - $rects[$i][2]) + 1) * (abs($rects[$i][1] - $rects[$i][3]) + 1);
            $this->area[$i] = $this->area[$i - 1] + $area;
            $this->total_area += $area;
        }
    }

    /**
     * @return Integer[]
     */
    function pick()
    {
        $v = rand(0, $this->total_area);
        $l = 0;
        $r = $this->count - 1;
        while ($l < $r) {
            $mid = $l + (($r - $l) >> 1);
            if ($this->area[$mid] >= $v) $r = $mid;
            else $l = $mid + 1;
        }
        $rect = $this->rects[$r];
        $x = rand($rect[0], $rect[2]);
        $y = rand($rect[1], $rect[3]);
        return [$x, $y];
    }
}

/**
 * 因为它要每个矩形的点都等概率返回, 所以这里需要按矩形面积大小按等概率找矩形, 然后再随机找点
 * 所以面积这里需要前缀和+二分, 然后就是矩形内随机了
 *
 * 执行用时：56 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：22.2 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：35 / 35
 */