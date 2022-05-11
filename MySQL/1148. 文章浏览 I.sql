-- 1148. 文章浏览 I
-- https://leetcode.cn/problems/article-views-i/

select distinct author_id as id from Views where author_id = viewer_id order by author_id

--     执行用时：440 ms, 在所有 MySQL 提交中击败了41.39%的用户
--     内存消耗：0 B, 在所有 MySQL 提交中击败了100.00%的用户
--     通过测试用例：13 / 13