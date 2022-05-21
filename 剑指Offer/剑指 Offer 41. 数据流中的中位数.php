<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/22 5:50
 * Des: 剑指 Offer 41. 数据流中的中位数
 *      https://leetcode.cn/problems/shu-ju-liu-zhong-de-zhong-wei-shu-lcof/
 */

//见 ../Difficult/295. 数据流的中位数.php

class MedianFinder
{

    public $maxHeap = null;
    public $minHeap = null;

    /**
     */
    function __construct()
    {
        $this->maxHeap = new SplMaxHeap();
        $this->minHeap = new SplMinHeap();
    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num)
    {
        if ($this->maxHeap->count() != $this->minHeap->count()) {
            $this->minHeap->insert($num);
            $this->maxHeap->insert($this->minHeap->extract());
        } else {
            //先插入大堆, 然后把大堆中的最小值移到小堆, 所以值是先进小堆, 再进大堆
            $this->maxHeap->insert($num);
            $this->minHeap->insert($this->maxHeap->extract());
        }
    }

    /**
     * @return Float
     */
    function findMedian()
    {
//        print_r([$this->minHeap, $this->maxHeap]);
        //小堆先有值
        if ($this->minHeap->count() > $this->maxHeap->count()) {
            return $this->minHeap->top();
        } else {
            return ($this->minHeap->top() + $this->maxHeap->top()) / 2;
        }
    }
}

/**
 * ["MedianFinder","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian","addNum","findMedian"]
 * [[],[6],[],[10],[],[2],[],[6],[],[5],[],[0],[],[6],[],[3],[],[1],[],[0],[],[0],[]]
 * [null,null,6.0,null,8.0,null,6.0,null,6.0,null,6.0,null,5.5,null,6.0,null,5.5,null,5.0,null,4.0,null,3.0]
 */

$obj = new MedianFinder();
$obj->addNum(6);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(10);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(2);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(6);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(5);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(0);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(6);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(3);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(1);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(0);
echo $obj->findMedian() . PHP_EOL;
$obj->addNum(0);
echo $obj->findMedian() . PHP_EOL;

/**
 * 执行用时：324 ms, 在所有 PHP 提交中击败了76.47%的用户
 * 内存消耗：62.7 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：21 / 21
 */