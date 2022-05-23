-- 511. 游戏玩法分析 I
-- https://leetcode.cn/problems/game-play-analysis-i/

select player_id,min(event_date) as first_login from Activity group by player_id

--     执行用时：485 ms, 在所有 MySQL 提交中击败了72.37%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：12 / 12