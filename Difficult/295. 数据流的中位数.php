<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/22 5:50
 * Des: 295. 数据流的中位数
 *      https://leetcode.cn/problems/find-median-from-data-stream/
 *      中位数是有序列表中间的数。如果列表长度是偶数，中位数则是中间两个数的平均值。
 */

class MedianFinder
{

    public $items = [];
    public $n = 0;

    /**
     */
    function __construct()
    {

    }

    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num)
    {
        if ($this->n == 0 || $num >= $this->items[$this->n - 1]) {
            $this->items[] = $num;
            $this->n++;
            echo json_encode($this->items) . PHP_EOL;
            return null;
        }
        $l = 0;
        $r = $this->n - 1;
        while ($l < $r) {
            $mid = $l + (($r - $l) >> 1);
            if ($this->items[$mid] == $num) {
                $l = $mid;
                break;
            } elseif ($this->items[$mid] > $num) {
                $r = $mid - 1;
            } else {
                $l = $mid + 1;
            }
        }
        if ($this->items[$l] > $num) {
            $l--;
        }
        $this->items = array_merge(array_slice($this->items, 0, $l + 1), [$num], array_slice($this->items, $l + 1, $this->n - $l - 1));
        $this->n++;
        echo json_encode($this->items) . PHP_EOL;
    }

    /**
     * @return Float
     */
    function findMedian()
    {
        if ($this->n == 0) return null;
        $mid = $this->n >> 1;
        if ($this->n % 2 == 1) return $this->items[$mid];
        return ($this->items[$mid] + $this->items[$mid - 1]) / 2;
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
 * 看题解才知道这题应该用大/小顶堆来做, 大顶堆存较大的那一半, 且数据结构本身就把插入的数据排序了, 小的那一半存小顶堆
 * 然后奇数个从多的那个堆取顶部, 偶数个时取2个队的顶部求平均值即可
 * PHP就是用SPL扩展中的SplMaxHeap和SplMinHeap, 貌似SplPriorityQueue也可
 * 大小堆写法见 ../剑指Offer/剑指 Offer 41. 数据流中的中位数.php
 *
 * 执行用时：1328 ms, 在所有 PHP 提交中击败了14.29%的用户
 * 内存消耗：41 MB, 在所有 PHP 提交中击败了14.29%的用户
 * 通过测试用例：18 / 18
 */

