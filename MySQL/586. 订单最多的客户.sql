-- 586. 订单最多的客户
-- https://leetcode.cn/problems/customer-placing-the-largest-number-of-orders/

select customer_number from Orders group by customer_number order by count(order_number) desc limit 1

-- 执行用时：487 ms, 在所有 MySQL 提交中击败了75.07%的用户
-- 内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
-- 通过测试用例：20 / 20