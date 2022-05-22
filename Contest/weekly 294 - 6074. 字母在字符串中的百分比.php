<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/22 10:26
 * Des: todo list
 */

class Solution {

    /**
     * @param String $s
     * @param String $letter
     * @return Integer
     */
    function percentageLetter($s, $letter) {
        $count = 0;
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            if($s[$i]==$letter) $count++;
        }
        return intval($count / $len * 100);
    }
}