<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/12 23:33
 * Des: todo list
 */

class Solution
{

    /**
     * @param Integer[] $widths
     * @param String    $s
     * @return Integer[]
     * 写字符串需要的行数
     * https://leetcode-cn.com/problems/number-of-lines-to-write-string/
     */
    function numberOfLines($widths, $s)
    {
        $lines = 1;
        $w = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $w += $widths[ord($s[$i]) - 97];
            if ($w > 100) {
                $lines++;
                $w = $widths[ord($s[$i]) - 97];
            }
        }
        return [$lines, $w];
    }
}

print_r((new Solution())->numberOfLines([10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10], "abcdefghijklmnopqrstuvwxyz"));
print_r((new Solution())->numberOfLines([4, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10], "bbbcccdddaaa"));

/*
执行用时：4 ms, 在所有 PHP 提交中击败了75.00%的用户
内存消耗：18.4 MB, 在所有 PHP 提交中击败了100.00%的用户
通过测试用例：27 / 27
 */