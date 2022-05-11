-- 175. 组合两个表
-- https://leetcode.cn/problems/combine-two-tables/

select p.firstName,p.lastName,a.city,a.state  from Person p left join Address a on p.personId =a.personId

--     执行用时：492 ms, 在所有 MySQL 提交中击败了17.37%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：8 / 8