-- 1965. 丢失信息的雇员
-- https://leetcode.cn/problems/employees-with-missing-information/

select employee_id from
    (select Employees.employee_id from Employees left join Salaries on Employees.employee_id=Salaries.employee_id where Salaries.salary  is null
     union
     select Salaries.employee_id from Salaries left join Employees on Employees.employee_id=Salaries.employee_id where Employees.name  is null
    )t
order by employee_id

--     执行用时：630 ms, 在所有 MySQL 提交中击败了29.68%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：12 / 12