<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/16 17:53
 * Desc: 36. 有效的数独
 *       https://leetcode.cn/problems/valid-sudoku/
 *       请你判断一个 9 x 9 的数独是否有效。只需要 根据以下规则 ，验证已经填入的数字是否有效即可。
 *       数字 1-9 在每一行只能出现一次。
 *       数字 1-9 在每一列只能出现一次。
 *       数字 1-9 在每一个以粗实线分隔的 3x3 宫内只能出现一次。（请参考示例图）
 *
 *       注意：
 *       一个有效的数独（部分已被填充）不一定是可解的。
 *       只需要根据以上规则，验证已经填入的数字是否有效即可。
 *       空白格用 '.' 表示。
 */

class Solution
{

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board)
    {
        $rows = $cols = $squares = [];
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($board[$i][$j] == '.')
                    continue;
                $rows[$i][] = $board[$i][$j];
                $cols[$j][] = $board[$i][$j];
                $x = intval($i / 3) * 3 + intval($j / 3);
                $squares[$x][] = $board[$i][$j];
            }
        }
        foreach ($rows as $row) if (count($row) != count(array_unique($row))) return false;
        foreach ($cols as $col) if (count($col) != count(array_unique($col))) return false;
        foreach ($squares as $square) if (count($square) != count(array_unique($square))) return false;
        return true;
    }
}

/**
 * 主要就是计算当前在第几个方块, 行列都没啥
 * 要是解数独那还有点难度, 这个到还没思考过, 我能想到的就是暴力模拟
 * 
 * 执行用时：28 ms, 在所有 PHP 提交中击败了77.61%的用户
 * 内存消耗：18.8 MB, 在所有 PHP 提交中击败了34.33%的用户
 * 通过测试用例：507 / 507
 */