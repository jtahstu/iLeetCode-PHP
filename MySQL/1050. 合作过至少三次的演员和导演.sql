-- 1050. 合作过至少三次的演员和导演
-- https://leetcode.cn/problems/actors-and-directors-who-cooperated-at-least-three-times/

select actor_id,director_id from ActorDirector group by actor_id,director_id having count(*)>=3

--     执行用时：365 ms, 在所有 MySQL 提交中击败了72.60%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：12 / 12