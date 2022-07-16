<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/7/3 17:49
 * Des: 556. 下一个更大元素 III
 *      https://leetcode.cn/problems/next-greater-element-iii/
 *      给你一个正整数 n ，请你找出符合条件的最小整数，其由重新排列 n 中存在的每位数字组成，并且其值大于 n 。如果不存在这样的正整数，则返回 -1 。
 *      注意 ，返回的整数应当是一个 32 位整数 ，如果存在满足题意的答案，但不是 32 位整数 ，同样返回 -1 。
 */

class Solution
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function nextGreaterElement($n)
    {
        $s = strval($n);
        $len = strlen($s);
        if ($len == 1) return -1;
        $l = $len - 2;
        while ($l >= 0) {
            $x = -1;
            for ($i = $len - 1; $i > $l; $i--) {
                if ($s[$i] > $s[$l]) {
                    if ($s[$i] < $s[$x]) {
                        $x = $i;
                    }
                    $x = $x == -1 ? $i : $x;
                }
            }
            if ($x == -1) {
                $l--;
                continue;
            }
            [$s[$l], $s[$x]] = [$s[$x], $s[$l]];
            $f = substr($s, 0, $l + 1);
            $sub = substr($s, $l + 1, $len - $l - 1);
            if (!$sub) return intval($s);
            $nums = str_split($sub);
            sort($nums);
            $res = intval($f . implode('', $nums));
            echo $res . PHP_EOL;
            if ($res > (2 << 30) - 1) break;  //2147483647
            return $res;
        }
        return -1;
    }
}

var_dump((new Solution())->nextGreaterElement(4232));
var_dump((new Solution())->nextGreaterElement(230241));  //230412    //231024
var_dump((new Solution())->nextGreaterElement(2147483476));  //2147483647    //231024

/**
 * 从后往前找l位置后半部分比l处大的数字, 在所有大的数字中找最小的数字和当前位置l对调, 然后后半部分升序排列
 * 虽然也可理解为全排列中, 当前数字的下一个排列, 但是那样计算量就大很多, 不是很推荐
 *
 * 执行用时：8 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了50.00%的用户
 * 通过测试用例：39 / 39
 */
