-- 1873. 计算特殊奖金
-- https://leetcode.cn/problems/calculate-special-bonus/

select employee_id,if(employee_id%2=1 and SUBSTR(name,1,1)!='M',salary,0) as bonus from Employees

-- 执行用时：678 ms, 在所有 MySQL 提交中击败了16.60%的用户
-- 内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
-- 通过测试用例：22 / 22