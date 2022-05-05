<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/6 0:45
 * Des: 1476. 子矩形查询
 *      https://leetcode.cn/problems/subrectangle-queries/
 */

class SubrectangleQueries
{

    private $list = [];

    /**
     * @param Integer[][] $rectangle
     */
    function __construct($rectangle)
    {
        $this->list = $rectangle;
    }

    /**
     * @param Integer $row1
     * @param Integer $col1
     * @param Integer $row2
     * @param Integer $col2
     * @param Integer $newValue
     * @return NULL
     */
    function updateSubrectangle($row1, $col1, $row2, $col2, $newValue)
    {
        for ($i = $row1; $i <= $row2; $i++) {
            for ($j = $col1; $j <= $col2; $j++) {
                $this->list[$i][$j] = $newValue;
            }
        }
    }

    /**
     * @param Integer $row
     * @param Integer $col
     * @return Integer
     */
    function getValue($row, $col)
    {
        return $this->list[$row][$col];
    }
}

/**
 * Your SubrectangleQueries object will be instantiated and called as such:
 * $obj = SubrectangleQueries($rectangle);
 * $obj->updateSubrectangle($row1, $col1, $row2, $col2, $newValue);
 * $ret_2 = $obj->getValue($row, $col);
 */
$subrectangleQueries = new SubrectangleQueries([[1, 2, 1], [4, 3, 4], [3, 2, 1], [1, 1, 1]]);
// 初始的 (4x3) 矩形如下：
// 1 2 1
// 4 3 4
// 3 2 1
// 1 1 1
echo PHP_EOL . $subrectangleQueries->getValue(0, 2); // 返回 1
$subrectangleQueries->updateSubrectangle(0, 0, 3, 2, 5);
// 此次更新后矩形变为：
// 5 5 5
// 5 5 5
// 5 5 5
// 5 5 5
echo PHP_EOL . $subrectangleQueries->getValue(0, 2); // 返回 5
echo PHP_EOL . $subrectangleQueries->getValue(3, 1); // 返回 5
$subrectangleQueries->updateSubrectangle(3, 0, 3, 2, 10);
// 此次更新后矩形变为：
// 5   5   5
// 5   5   5
// 5   5   5
// 10  10  10
echo PHP_EOL . $subrectangleQueries->getValue(3, 1); // 返回 10
echo PHP_EOL . $subrectangleQueries->getValue(0, 2); // 返回 5

/**
 * 暴力直接
 * 执行用时：72 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：24.6 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：52 / 52
 *
 * 咱这也是双百, 热门语言想效率点就是记录操作记录
 * 直接从操作记录里倒序找到当前查找的值是哪次更新的, 找不到就是没操作直接返回原始数组里的值即可
 * for(int i=len-1; i>=0; i--){
    if(C1[i] <= col && col <= C2[i] && R1[i] <= row && row <= R2[i]){
        return V[i];
    }
   }
   return rectangle[row][col];
 */