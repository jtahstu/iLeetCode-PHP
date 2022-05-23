-- 1393. 股票的资本损益
-- https://leetcode.cn/problems/capital-gainloss/

select  stock_name,sum(if(operation='Sell', price, 0))-sum(if(operation='Buy', price, 0)) as capital_gain_loss from Stocks group by stock_name

--     执行用时：547 ms, 在所有 MySQL 提交中击败了27.57%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：17 / 17