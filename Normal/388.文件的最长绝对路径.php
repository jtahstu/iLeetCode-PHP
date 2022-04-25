<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/4/20 0:41
 * Des: 388. 文件的最长绝对路径
 *      https://leetcode-cn.com/problems/longest-absolute-file-path/
 *      假设有一个同时存储文件和目录的文件系统。
 *      给定一个以上述格式表示文件系统的字符串 input ，返回文件系统中 指向 文件 的 最长绝对路径 的长度 。 如果系统中没有文件，返回 0。
 */

class Solution
{

    private $list = [];

    /**
     * @param String $input
     * @return Integer
     */
    function lengthLongestPath($input)
    {
        $arr = explode("\n", $input);
        $index_arr = [0];
        for ($i = 0; $i < count($arr); $i++) {
            $t_count = substr_count($arr[$i], "\t") + 1; //往后移一位, 防止取上层目录拿不到
            $arr[$i] = str_replace("\t", '', $arr[$i]);
            if (stripos($arr[$i], '.') === false) {     //是目录, 记录当前层级路径长度
                $index_arr[$t_count] = $index_arr[$t_count - 1] + strlen($arr[$i]) + 1;
            } else {                                            //是文件, 计算上层目录长度+当前文件长度
                $this->list[] = $index_arr[$t_count - 1] + strlen($arr[$i]);
            }
        }
//        print_r($index_arr);
        return $this->list ? max($this->list) : 0;
    }
}


var_dump((new Solution())->lengthLongestPath("dir\n\tsubdir1\n\tsubdir2\n\t\tfile.ext"));
var_dump((new Solution())->lengthLongestPath("dir\n\tsubdir1\n\t\tfile1.ext\n\t\tsubsubdir1\n\tsubdir2\n\t\tsubsubdir2\n\t\t\tfile2.ext"));
var_dump((new Solution())->lengthLongestPath("t"));
var_dump((new Solution())->lengthLongestPath("file1.txt\nfile2.txt\nlongfile.txt"));

/*
 * 执行用时：4 ms, 在所有 PHP 提交中击败了100.00%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了100.00%的用户
 * 通过测试用例：26 / 26
 */

// 这个写法很简洁, 思路和我PHP解法是一样的
//class Solution:
//    def lengthLongestPath(self, input: str) -> int:
//        ans = 0
//        file_list = input.split('\n')
//        dir_map = collections.defaultdict()
//        for my_file in file_list:
//            my_list = my_file.split('\t')
//            num = len(my_list)
//            str_len = len(my_list[-1])
//            if num == 1:
//                dir_map[num - 1] = str_len
//            else:
//                dir_map[num - 1] = dir_map[num - 2] + 1 + str_len
//            if '.' in my_list[-1]:
//                ans = max(ans, dir_map[num-1])
//        return ans