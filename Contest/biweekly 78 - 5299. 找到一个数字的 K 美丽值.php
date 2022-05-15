<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/14 22:29
 * Des: 5299. 找到一个数字的 K 美丽值
 *      https://leetcode.cn/problems/find-the-k-beauty-of-a-number/
 */

class Solution {

    /**
     * @param Integer $num
     * @param Integer $k
     * @return Integer
     */
    function divisorSubstrings($num, $k) {
        $count = 0;
        $str = strval($num);
//        var_dump($str);
        for ($i = 0; $i < strlen($str)-$k+1; $i++) {
            $v = substr($str, $i, $k);
//            print_r($v);
            $v = intval($v);
            if($v==0) {
                continue;
            }
            if($num % $v==0) {
                $count++;
            }
        }
        return $count;
    }
}

var_dump((new Solution)->divisorSubstrings(430043, 2));

//AC