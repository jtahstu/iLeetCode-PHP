<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/19 14:47
 * Des: 剑指 Offer 13. 机器人的运动范围
 *      https://leetcode.cn/problems/ji-qi-ren-de-yun-dong-fan-wei-lcof/
 *      地上有一个m行n列的方格，从坐标 [0,0] 到坐标 [m-1,n-1] 。一个机器人从坐标 [0, 0] 的格子开始移动，它每次可以向左、右、上、下移动一格（不能移动到方格外），也不能进入行坐标和列坐标的数位之和大于k的格子。例如，       当k为18时，机器人能够进入方格 [35, 37] ，因为3+5+3+7=18。但它不能进入方格 [35, 38]，因为3+5+3+8=19。请问该机器人能够到达多少个格子？
 */

class Solution
{

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function movingCount($m, $n, $k)
    {
        $hash = [];
        for ($i = 0; $i <= max($m, $n); $i++) {
            $hash[$i] = 0;
            $j = $i;
            while ($j) {
                $hash[$i] += $j % 10;
                $j = $j / 10;
            }
        }

        $visited = [[1]];
        $items = [[0, 0]];
        $paths = [[1, 0], [0, 1]]; // [[1, 0], [-1, 0], [0, 1], [0, -1]]
        $count = 1;
        while ($items) {
            $cur = array_shift($items);
//            echo $cur[0] . ',' . $cur[1] . ' ';
            foreach ($paths as $path) {
                $v = [$cur[0] + $path[0], $cur[1] + $path[1]];
                if (!isset($visited[$v[0]][$v[1]])
                    && $v[0] >= 0 && $v[1] >= 0 && $v[0] < $m && $v[1] < $n
                    && $hash[$v[0]] + $hash[$v[1]] <= $k) {
                    $items[] = $v;
                    $visited[$v[0]][$v[1]] = 1;
                    $count++;
                }
            }
        }
        return $count;
    }
}

var_dump((new Solution)->movingCount(2, 3, 1));  //3
var_dump((new Solution)->movingCount(16, 8, 4));  //15

/**
 * 深搜/广搜都ok, 我的第一想法是广搜
 * 直接遍历一遍二维数组也可以, QAQ
 * 执行用时：732 ms, 在所有 PHP 提交中击败了7.69%的用户
 * 内存消耗：19 MB, 在所有 PHP 提交中击败了84.62%的用户
 * 通过测试用例：49 / 49
 */

//class Solution {
//    public int movingCount(int m, int n, int k) {
//        boolean[][] visited = new boolean[m][n];
//        return dfs(0, 0, m, n, k, visited);
//    }
//
//  public int dfs(int i, int j, int m, int n, int k, boolean[][] visited) {
//    if(i >= m || j >= n || k < getSum(i) + getSum(j) || visited[i][j]) {
//        return 0;
//    }
//    visited[i][j] = true;
//    return 1 + dfs(i + 1, j, m, n, k, visited) + dfs(i, j + 1, m, n, k, visited);
//  }
//
//    private int getSum(int a) {
//    int sum = a % 10;
//        int tmp = a / 10;
//        while(tmp > 0) {
//            sum += tmp % 10;
//            tmp /= 10;
//        }
//        return sum;
//    }
//}

//class Solution {
//
//    /**
//     * @param Integer $m
//     * @param Integer $n
//     * @param Integer $k
//     * @return Integer
//     */
//    function movingCount($m, $n, $k) {
//        $count = 1;
//        $status[0][0] = 1;
//        for($i=0;$i<$m;$i++){
//            for($j=0;$j<$n;$j++){
//                if($i>9) $Column = floor($i/10)+$i%10;
//                else $Column = $i;
//                if($j>9) $Row = floor($j/10)+$j%10;
//                else $Row = $j;
//                if($Column+$Row<=$k){
//                    if($status[$i][$j-1]==1 || $status[$i-1][$j]==1){
//                        $count++;
//                        $status[$i][$j] = 1;
//                    }
//                }
//            }
//        }
//        return $count;
//    }
//}