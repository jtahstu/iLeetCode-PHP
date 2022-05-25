-- 1084. 销售分析III
-- https://leetcode.cn/problems/sales-analysis-iii/

select product_id,product_name from Product where  product_id in (
    select distinct product_id from Sales where product_id not in (select distinct product_id from Sales where sale_date<'2019-01-01' or sale_date>'2019-03-31'))

SELECT p.product_id,product_name FROM sales s,product p
WHERE s.product_id=p.product_id
GROUP BY p.product_id
HAVING SUM(sale_date < '2019-01-01')=0
   AND SUM(sale_date>'2019-03-31')=0;

-- 执行用时：1009 ms, 在所有 MySQL 提交中击败了61.66%的用户
-- 内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
-- 通过测试用例：12 / 12