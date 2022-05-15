<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/15 11:36
 * Des: todo list
 */

class CountIntervals {
    public $arr = [];
    public $count = -1;
    /**
     */
    function __construct() {
        //貌似是线段树, but我不会, 哈哈哈
        $this->arr = [];
        $this->count = -1;
    }

    /**
     * @param Integer $left
     * @param Integer $right
     * @return NULL
     */
    function add($left, $right) {
        $this->arr[] = [$left, $right];
        if($this->count==-1){
            echo "add " . ($right-$left+1) .PHP_EOL;
            $this->count += $right-$left+1+1;
        }
        for ($i = 0; $i < count($this->arr)-1; $i++) {
            if($left > $this->arr[$i][1] || $right < $this->arr[$i][0]) {
                $this->count += $right-$left+1;
                echo "add " . ($right-$left+1) .PHP_EOL;
                continue;
            }
            if($right>$this->arr[$i][0]) {
                $this->count = $this->count - ($right-$this->arr[$i][0]+1);
                echo "jian " . ($right-$this->arr[$i][0]+1) .PHP_EOL;
                continue;
            }
            if($left < $this->arr[$i][1]) {
                $l = max($left, $this->arr[$i][0]);
                $r = max($right, $this->arr[$i][1]);
                $this->count += $r-$l;
                echo "add " . ($r-$l) .PHP_EOL;
            }
        }
        $sort_arr = [];
        foreach($this->arr as $x) {
            $sort_arr[] = $x[1];
        }
        array_multisort($sort_arr, SORT_NUMERIC, SORT_ASC, $this->arr);
    }

    /**
     * @return Integer
     */
    function count() {
        return $this->count == -1 ? 0 : $this->count;
    }
}

/**
 * Your CountIntervals object will be instantiated and called as such:
 * $obj = CountIntervals();
 * $obj->add($left, $right);
 * $ret_2 = $obj->count();
 */

$obj = new CountIntervals();
//$obj->add(2, 3);
//$obj->add(7, 10);
//var_dump($obj->count());
//$obj->add(5, 8);
//var_dump($obj->count());

var_dump($obj->count());
$obj->add(39, 44);
$obj->add(13, 49);
var_dump($obj->count());
var_dump($obj->count());
$obj->add(47, 50);
var_dump($obj->count());

//这周我来研究一下线段树, 我这存模拟暴力的方式估计也是会超时

//WA