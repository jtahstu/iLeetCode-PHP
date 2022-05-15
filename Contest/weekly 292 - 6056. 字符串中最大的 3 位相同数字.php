<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/8 10:31
 * Des: todo list
 */

class Solution
{

    /**
     * @param String $num
     * @return String
     */
    function largestGoodInteger($num)
    {
        $max_c = PHP_INT_MIN;
        $max_str = '';
        for ($i = 0; $i < strlen($num) - 2; $i++) {
            $s = substr($num, $i, 3);
            if ($s[0] == $s[1] && $s[1] == $s[2]) {
                if ($s > $max_c) {
                    $max_str = $s;
                    $max_c = intval($s);
                }
            }
        }
        return $max_str;
    }
}

var_dump((new Solution)->largestGoodInteger("6777133339"));
var_dump((new Solution)->largestGoodInteger("2300019"));
var_dump((new Solution)->largestGoodInteger("42352338"));
var_dump((new Solution)->largestGoodInteger("2221"));

//AC