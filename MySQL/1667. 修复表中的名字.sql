-- 1667. 修复表中的名字
-- https://leetcode.cn/problems/fix-names-in-a-table/

select user_id,concat(upper(substring(name,1,1)), lower(substring(name,2))) name from Users order by user_id

--     执行用时：720 ms, 在所有 MySQL 提交中击败了17.32%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：21 / 21
