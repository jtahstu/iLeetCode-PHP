-- 183. 从不订购的客户
-- https://leetcode.cn/problems/customers-who-never-order/

select Name as Customers from Customers where Id not in (select distinct CustomerId from Orders)

--     执行用时：281 ms, 在所有 MySQL 提交中击败了93.84%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：11 / 11