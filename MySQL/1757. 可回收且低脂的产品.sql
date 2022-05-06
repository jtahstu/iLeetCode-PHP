-- 1757. 可回收且低脂的产品
-- https://leetcode.cn/problems/recyclable-and-low-fat-products/

select product_id from Products where low_fats='Y' and recyclable='Y'

--     执行用时：656 ms, 在所有 MySQL 提交中击败了10.73%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：22 / 22