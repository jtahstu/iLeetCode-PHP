<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/27 22:50
 * Des: 417. 太平洋大西洋水流问题
 *      https://leetcode-cn.com/problems/pacific-atlantic-water-flow/
 *      有一个 m × n 的矩形岛屿，与 太平洋 和 大西洋 相邻。 “太平洋” 处于大陆的左边界和上边界，而 “大西洋” 处于大陆的右边界和下边界。
 * 这个岛被分割成一个由若干方形单元格组成的网格。给定一个 m x n 的整数矩阵 heights ， heights[r][c] 表示坐标 (r, c) 上单元格 高于海平面的高度 。
 * 岛上雨水较多，如果相邻单元格的高度 小于或等于 当前单元格的高度，雨水可以直接向北、南、东、西流向相邻单元格。水可以从海洋附近的任何单元格流入海洋。
 * 返回网格坐标 result 的 2D 列表 ，其中 result[i] = [ri, ci] 表示雨水从单元格 (ri, ci) 流动 既可流向太平洋也可流向大西洋 。
 */

class Solution
{

    public $heights = [];
    public $x = 0;
    public $y = 0;


    /**
     * @param Integer[][] $heights
     * @return Integer[][]
     */
    function pacificAtlantic($heights)
    {
        $this->heights = $heights;
        $this->x = count($heights[0]); //长
        $this->y = count($heights); //宽
        $ans1 = [];  //左/上结果集
        $ans2 = [];  //右/下结果集
        for ($i = 0; $i < $this->y; $i++) {
            $this->dfs($i, 0, $ans1); //左边
            $this->dfs($i, $this->x - 1, $ans2);  //右边
        }
        for ($j = 0; $j < $this->x; $j++) {
            $this->dfs(0, $j, $ans1);  //上边
            $this->dfs($this->y - 1, $j, $ans2);  //下边
        }
        //交集即为两边都能流出的结果
        $ans = [];
        for ($i = 0; $i < $this->y; $i++) {
            for ($j = 0; $j < $this->x; $j++) {
                if (isset($ans1[$i][$j]) && isset($ans2[$i][$j]) && $ans1[$i][$j] && $ans2[$i][$j]) {
                    $ans[] = [$i, $j];
                }
            }
        }
        return $ans;
    }

    function dfs($i, $j, &$ans)
    {
        if (isset($ans[$i][$j]) && $ans[$i][$j]) { //已ok的退出
            return;
        }
        $ans[$i][$j] = 1;

        //往4个方向搜索, 且判断是否能访问
        if ($i - 1 >= 0 && $this->heights[$i - 1][$j] >= $this->heights[$i][$j]) {
            $this->dfs($i - 1, $j, $ans);
        }
        if ($i + 1 < $this->x && $this->heights[$i + 1][$j] >= $this->heights[$i][$j]) {
            $this->dfs($i + 1, $j, $ans);
        }
        if ($j - 1 >= 0 && $this->heights[$i][$j - 1] >= $this->heights[$i][$j]) {
            $this->dfs($i, $j - 1, $ans);
        }
        if ($j + 1 < $this->y && $this->heights[$i][$j + 1] >= $this->heights[$i][$j]) {
            $this->dfs($i, $j + 1, $ans);
        }
    }
}

echo json_encode((new Solution())->pacificAtlantic([[1, 2, 2, 3, 5], [3, 2, 3, 4, 4], [2, 4, 5, 3, 1], [6, 7, 1, 4, 5], [5, 1, 1, 2, 4]]));
echo PHP_EOL;
echo json_encode((new Solution())->pacificAtlantic([[2, 1], [1, 2]]));