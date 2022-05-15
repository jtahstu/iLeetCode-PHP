<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/15 10:07
 * Des: todo list
 */

class Solution
{

    /**
     * @param Integer[] $candidates
     * @return Integer
     */
    function largestCombination($candidates)
    {
        $max = 0;
        $dp = [];
        for ($i = 0; $i < count($candidates); $i++) {
            $bin = decbin($candidates[$i]);
//            echo "$candidates[$i] $bin\n";
            $bin = strrev($bin);
            for ($j = 0; $j <strlen($bin); $j++) {
                if($bin[$j]=='1') {
                    $dp[$j] = isset($dp[$j]) ? $dp[$j] + 1 : 1;
                    $max = max($max, $dp[$j]);
                }
            }
        }
//        print_r($dp);
        return $max;
    }
}

var_dump((new Solution)->largestCombination([16, 17, 71, 62, 12, 24, 14]));

//AC