-- 584. 寻找用户推荐人
-- https://leetcode.cn/problems/find-customer-referee/

select name from customer where referee_id != 2 or referee_id is null

-- 执行用时：492 ms, 在所有 MySQL 提交中击败了64.57%的用户
-- 内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
-- 通过测试用例：19 / 19