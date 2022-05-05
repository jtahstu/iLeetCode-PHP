<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/5 19:24
 * Des: 933. 最近的请求次数
 *      https://leetcode.cn/problems/number-of-recent-calls/
 *      写一个 RecentCounter 类来计算特定时间范围内最近的请求。
 */

class RecentCounter
{

    private $ping_times = [];

    function __construct()
    {
        $this->ping_times = [];
    }

    /**
     * @param Integer $t
     * @return Integer
     */
    function ping($t)
    {
        $this->ping_times[] = $t;

//        $count = 0;
//        for ($i = count($this->ping_times) - 1; $i >= 0; $i--) {  //朴素解法, 从后往前统计数量
//            if ($t - $this->ping_times[$i] <= 3000) {
//                $count++;
//            } else {
//                break;
//            }
//        }
//        return $count;

        while ($this->ping_times[0] < $t - 3000) { //只要不是3000内的直接弹出即可
            array_shift($this->ping_times);
        }
        return count($this->ping_times);
    }
}

/**
 * Your RecentCounter object will be instantiated and called as such:
 * $obj = RecentCounter();
 * $ret_1 = $obj->ping($t);
 */

$obj = new RecentCounter();
var_dump($obj->ping(1));
var_dump($obj->ping(100));
var_dump($obj->ping(3001));
var_dump($obj->ping(3002));
var_dump($obj->ping(3005));

/**
 * 执行用时：188 ms, 在所有 PHP 提交中击败了75.00%的用户
 * 内存消耗：30.3 MB, 在所有 PHP 提交中击败了25.00%的用户
 * 通过测试用例：68 / 68
 *
 * 朴素的解法就慢很多
 * 执行用时：908 ms, 在所有 PHP 提交中击败了25.00%的用户
 * 内存消耗：30 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：68 / 68
 */