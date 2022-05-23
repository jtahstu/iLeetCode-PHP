<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/5/23 11:08
 * Des: 675. 为高尔夫比赛砍树
 *      https://leetcode.cn/problems/cut-off-trees-for-golf-event/
 */

class Solution
{

    public $forest = [];

    /**
     * @param Integer[][] $forest
     * @return Integer
     */
    function cutOffTree($forest)
    {
        $n = count($forest);
        $m = count($forest[0]);
        $can_visited = 0;
        foreach ($forest as $rows) {
            foreach ($rows as $item) {
                $can_visited += $item ? 1 : 0;
            }
        }
        $visited = [[1]];
        $items = [[0, 0]];
        $paths = [[1, 0], [-1, 0], [0, 1], [0, -1]];
        $count = 0;
        $pre = 0;
        $res = [];
        while ($items) {
            $cur = array_shift($items);
            $res[] = $cur;
//            echo $cur[0] . ',' . $cur[1] . ' ';
            foreach ($paths as $path) {
                $v = [$cur[0] + $path[0], $cur[1] + $path[1]];
                if (!isset($visited[$v[0]][$v[1]])
                    && $v[0] >= 0 && $v[1] >= 0 && $v[0] < $n && $v[1] < $m
                    && $forest[$v[0]][$v[1]] > $pre) {
                    $items[] = $v;
                    $visited[$v[0]][$v[1]] = 1;
                    $count++;
                    $pre = $forest[$v[0]][$v[1]];
                }
            }
        }
        echo json_encode($res) . PHP_EOL;
        return $count == $can_visited ? $count : -1;
    }
}

var_dump((new Solution)->cutOffTree([[1, 2, 3], [0, 0, 4], [7, 6, 5]]));
var_dump((new Solution)->cutOffTree([[54581641, 64080174, 24346381, 69107959], [86374198, 61363882, 68783324, 79706116], [668150, 92178815, 89819108, 94701471], [83920491, 22724204, 46281641, 47531096], [89078499, 18904913, 25462145, 60813308]]));

//var dir4 = []struct{ x, y int }{{-1, 0}, {1, 0}, {0, -1}, {0, 1}}
//
//func cutOffTree(forest [][]int) (ans int) {
//    type pair struct{ dis, x, y int }
//    trees := []pair{}
//    for i, row := range forest {
//        for j, h := range row {
//            if h > 1 {
//                trees = append(trees, pair{h, i, j})
//            }
//        }
//    }
//    sort.Slice(trees, func(i, j int) bool { return trees[i].dis < trees[j].dis })
//
//    bfs := func(sx, sy, tx, ty int) int {
//            m, n := len(forest), len(forest[0])
//        vis := make([][]bool, m)
//        for i := range vis {
//            vis[i] = make([]bool, n)
//        }
//        vis[sx][sy] = true
//        q := []pair{{0, sx, sy}}
//        for len(q) > 0 {
//            p := q[0]
//            q = q[1:]
//            if p.x == tx && p.y == ty {
//                return p.dis
//            }
//            for _, d := range dir4 {
//                if x, y := p.x+d.x, p.y+d.y; 0 <= x && x < m && 0 <= y && y < n && !vis[x][y] && forest[x][y] > 0 {
//                    vis[x][y] = true
//                    q = append(q, pair{p.dis + 1, x, y})
//                }
//            }
//        }
//        return -1
//    }
//
//    preX, preY := 0, 0
//    for _, t := range trees {
//        d := bfs(preX, preY, t.x, t.y)
//        if d < 0 {
//            return -1
//        }
//        ans += d
//        preX, preY = t.x, t.y
//    }
//    return
//}