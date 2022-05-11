-- 197. 上升的温度
-- https://leetcode.cn/problems/rising-temperature/

select w2.id from Weather w1,Weather w2 where w1.recordDate = DATE_SUB(w2.recordDate, INTERVAL 1 day) and w1.Temperature < w2.Temperature

--     执行用时：387 ms, 在所有 MySQL 提交中击败了88.54%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：14 / 14