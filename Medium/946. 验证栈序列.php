<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/31 9:41
 * Des: 946. 验证栈序列
 *      https://leetcode.cn/problems/validate-stack-sequences/
 *      给定 pushed 和 popped 两个序列，每个序列中的 值都不重复，只有当它们可能是在最初空栈上进行的推入 push 和弹出 pop 操作序列的结果时，返回 true；否则，返回 false 。
 */

class Solution
{

    /**
     * @param Integer[] $pushed
     * @param Integer[] $popped
     * @return Boolean
     */
    function validateStackSequences($pushed, $popped)
    {
        $queue = [];
        foreach ($popped as $val) {
            if ($val === end($queue)) {
                array_pop($queue);
                continue;
            }
            $flag = false;
            while ($pushed) {
                $p = array_shift($pushed);
                if ($p == $val) {
                    $flag = true;
                    break;
                }
                $queue[] = $p;
            }
            if (!$flag) {
                return false;
            }
        }
        return true;
    }
}

var_dump((new Solution)->validateStackSequences([1, 2, 3, 4, 5], [4, 5, 3, 2, 1]));
var_dump((new Solution)->validateStackSequences([1, 2, 3, 4, 5], [4, 3, 5, 1, 2]));
var_dump((new Solution)->validateStackSequences([1, 0, 3, 4, 2], [0, 3, 1, 4, 2]));

/**
 * 执行用时：32 ms, 在所有 PHP 提交中击败了33.33%的用户
 * 内存消耗：18.6 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：151 / 151
 */

//直接入栈, 然后判断顶部, 这样貌似好理解一点
//class Solution {
//    public boolean validateStackSequences(int[] pushed, int[] popped) {
//        Stack<Integer> stack = new Stack<>();
//        int i = 0;
//        for(int num : pushed) {
//            stack.push(num); // num 入栈
//            while(!stack.isEmpty() && stack.peek() == popped[i]) { // 循环判断与出栈
//                stack.pop();
//                i++;
//            }
//        }
//        return stack.isEmpty();
//    }
//}