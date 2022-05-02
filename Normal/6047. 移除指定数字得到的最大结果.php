<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/1 10:30
 * Des: todo list
 */

class Solution
{

    /**
     * @param String $number
     * @param String $digit
     * @return String
     */
    function removeDigit($number, $digit)
    {
        $flag = false;
        for ($i = 0; $i < strlen($number); $i++) {
            if ($number[$i] == $digit) {
                if ($i == strlen($number) - 1) {
                    $flag = true;
                    $number = substr($number, 0, $i);
                    break;
                }
                if ($number[$i + 1] > $number[$i]) {
                    $number = substr($number, 0, $i) . substr($number, $i + 1, strlen($number) - $i - 1);
                    $flag = true;
                    break;
                }
            }
        }
        if (!$flag) {
            for ($i = strlen($number) - 1; $i >= 0; $i--) {
                if ($number[$i] == $digit) {
                    $number = substr($number, 0, $i) . substr($number, $i + 1, strlen($number) - $i - 1);
                    break;
                }
            }
        }
//        print_r($number);
        return $number;
    }
}

var_dump((new Solution)->removeDigit("123", "3"));
var_dump((new Solution)->removeDigit("1231", "1"));
var_dump((new Solution)->removeDigit("551", "5"));
var_dump((new Solution)->removeDigit("210101", "1"));