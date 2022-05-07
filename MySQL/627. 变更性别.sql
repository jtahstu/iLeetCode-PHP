-- 627. 变更性别
-- https://leetcode.cn/problems/swap-salary/

update Salary set sex=if(sex='m','f','m')

-- 执行用时：244 ms, 在所有 MySQL 提交中击败了87.49%的用户
-- 内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
-- 通过测试用例：8 / 8