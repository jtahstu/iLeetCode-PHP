<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/28 22:19
 * Des: 6083. 判断一个数的数字计数是否等于数位的值
 *      https://leetcode.cn/contest/biweekly-contest-79/problems/check-if-number-has-equal-digit-count-and-digit-value/
 */

class Solution
{

    /**
     * @param String $num
     * @return Boolean
     */
    function digitCount($num)
    {
        $list = [];
        $n = strlen($num);
        for ($i = 0; $i < $n; $i++) {
            $list[$num[$i]] = isset($list[$num[$i]]) ? $list[$num[$i]] + 1 : 1;
        }
        $ans = true;
        for ($i = 0; $i < $n; $i++) {
            if($num[$i] ==0 && !isset($list[$num[$i]])){
                continue;
            }
            if ($num[$i] != $i) {
                $ans = false;
                break;
            }
        }
        return $ans;
    }
}

//脑子刚开始有点瓦特, 比较一直没捋清楚