<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/13 23:17
 * Des: 380. O(1) 时间插入、删除和获取随机元素
 *      https://leetcode-cn.com/problems/insert-delete-getrandom-o1/
 *      实现RandomizedSet 类：
            RandomizedSet() 初始化 RandomizedSet 对象
            bool insert(int val) 当元素 val 不存在时，向集合中插入该项，并返回 true ；否则，返回 false 。
            bool remove(int val) 当元素 val 存在时，从集合中移除该项，并返回 true ；否则，返回 false 。
            int getRandom() 随机返回现有集合中的一项（测试用例保证调用此方法时集合中至少存在一个元素）。每个元素应该有 相同的概率 被返回。
        你必须实现类的所有函数，并满足每个函数的 平均 时间复杂度为 O(1) 。
 */

class RandomizedSet
{
    /**
     */
    protected $list;

    function __construct()
    {
        $this->list = [];
        return null;
    }

    /**
     * @param Integer $val
     * @return Boolean
     */
    function insert($val)
    {
//        if (!in_array($val, $this->list)) {
//            $this->list[] = $val;
//            return true;
//        }
//        return false;
        if (isset($this->list[$val])) {
            return false;
        }
        $this->list[$val] = '';
        return true;
    }

    /**
     * @param Integer $val
     * @return Boolean
     */
    function remove($val)
    {
//        if (in_array($val, $this->list)) {
//            $this->list = array_diff($this->list, [$val]);
//            return true;
//        }
//        return false;
        if (isset($this->list[$val])) {
            unset($this->list[$val]);
            return true;
        }
        return false;
    }

    /**
     * @return Integer
     */
    function getRandom()
    {
//        $this->list = array_values($this->list);
//        return $this->list[rand(0, count($this->list) - 1)];
        $vals = array_keys($this->list);
        return $vals[rand(0, count($vals) - 1)];
    }
}

/**
 * Your RandomizedSet object will be instantiated and called as such:
 * $obj = RandomizedSet();
 * $ret_1 = $obj->insert($val);
 * $ret_2 = $obj->remove($val);
 * $ret_3 = $obj->getRandom();
 */

$s = new RandomizedSet();
var_dump($s->insert(1));
var_dump($s->remove(2));
var_dump($s->insert(2));
var_dump($s->getRandom());
var_dump($s->remove(1));
var_dump($s->insert(2));
var_dump($s->getRandom());

/*
执行用时：588 ms, 在所有 PHP 提交中击败了14.29%的用户
内存消耗：66.9 MB, 在所有 PHP 提交中击败了100.00%的用户
通过测试用例：19 / 19

执行用时：264 ms, 在所有 PHP 提交中击败了14.29%的用户
内存消耗：66.9 MB, 在所有 PHP 提交中击败了100.00%的用户
通过测试用例：19 / 19
貌似就快了一点，但是好像又没快
 */