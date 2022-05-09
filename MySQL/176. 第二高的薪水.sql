-- 176. 第二高的薪水
-- https://leetcode.cn/problems/second-highest-salary/submissions/

select (
           select salary from (SELECT salary, RANK() OVER (ORDER BY salary DESC) srank
                               FROM (select distinct salary from Employee)t)tt where srank=2
       ) as SecondHighestSalary

--     执行用时：236 ms, 在所有 MySQL 提交中击败了43.90%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：8 / 8

SELECT
    (SELECT DISTINCT
         Salary
     FROM
         Employee
     ORDER BY Salary DESC
        LIMIT 1 OFFSET 1) AS SecondHighestSalary