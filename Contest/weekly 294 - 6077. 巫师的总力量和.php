<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/22 10:26
 * Des: todo list
 */
//
//public $res = [];
//public $len = 0;
//public $nums = [];
//
///**
// * @param Integer[] $nums
// * @return Integer[][]
// */
//function subsets($nums)
//{
//    $this->nums = $nums;
//    $this->len = count($nums);
//    $this->dfs(0, []);
//    return $this->res;
//}
//
//function dfs($i, $t)
//{
//    $this->res[] = $t;
////        echo json_encode([$i,$t]).PHP_EOL;
//    if ($i == $this->len) return;
//    for ($j = $i; $j < $this->len; $j++) {
//        $t[] = $this->nums[$j];
//        $this->dfs($j + 1, $t);
//        $v = array_pop($t);
////            echo "$v\n";
//    }
//}

class Solution
{


    /**
     * @param Integer[] $strength
     * @return Integer
     */
    function totalStrength($strength)
    {
        $mod = 1000000007;
        $n = count($strength);
        $sum_arr = [$strength[0]];
        $min_arr = [$strength[0]];
        for ($i = 1; $i < $n; $i++) {
            $sum_arr[$i] = $strength[$i] + $sum_arr[$i - 1];
            $min_arr[$i] = min($strength[$i], $min_arr[$i - 1]);
        }
        $ans = 0;
        for ($i = 0; $i < $n; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($i + $j > $n) {
                    break;
                }
                $arr = array_slice($strength, $i, $j);
                $sum = ($sum_arr[$i + $j - 1] - $sum_arr[$i - 1]) % $mod;
                $min = min($arr) % $mod;
                $ans = ($ans + (($sum * $min) % $mod)) % $mod;
            }
        }
        return $ans;
    }


}

var_dump((new Solution)->totalStrength([1, 3, 1, 2]));
var_dump((new Solution)->totalStrength([5, 4, 6]));
var_dump((new Solution)->totalStrength([747, 812, 112, 1230, 1426, 1477, 1388, 976, 849, 1431, 1885, 1845, 1070, 1980, 280, 1075, 232, 1330, 1868, 1696, 1361, 1822, 524, 1899, 1904, 538, 731, 985, 279, 1608, 1558, 930, 1232, 1497, 875, 1850, 1173, 805, 1720, 33, 233, 330, 1429, 1688, 281, 362, 1963, 927, 1688, 256, 1594, 1823, 743, 553, 1633, 1898, 1101, 1278, 717, 522, 1926, 1451, 119, 1283, 1016, 194, 780, 1436, 1233, 710, 1608, 523, 874, 1779, 1822, 134, 1984]));  //471441678