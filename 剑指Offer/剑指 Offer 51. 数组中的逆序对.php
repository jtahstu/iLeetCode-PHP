<?php
/**
 * Created by PhpStorm
 * User: jtahstu
 * Time: 2022/6/5 20:11
 * Des: 剑指 Offer 51. 数组中的逆序对
 *      https://leetcode.cn/problems/shu-zu-zhong-de-ni-xu-dui-lcof/
 *      在数组中的两个数字，如果前面一个数字大于后面的数字，则这两个数字组成一个逆序对。输入一个数组，求出这个数组中的逆序对的总数。
 */

//func reversePairs(nums []int) int {
//    return mergeSort(nums, 0, len(nums)-1)
//}
//
//func mergeSort(nums []int, left, right int) int {
//    if left >= right {
//        return 0
//	}
//    mid := (left + right) >> 1
//	res := mergeSort(nums, left, mid) + mergeSort(nums, mid+1, right)
//	i, j := left, mid+1
//	var tmp []int
//	for i <= mid && j <= right {
//        if nums[i] <= nums[j] {
//            tmp = append(tmp, nums[i])
//			i++
//		} else {
//            res += (mid - i + 1)
//			tmp = append(tmp, nums[j])
//			j++
//		}
//    }
//	for i <= mid {
//        tmp = append(tmp, nums[i])
//		i++
//	}
//	for j <= right {
//        tmp = append(tmp, nums[j])
//		j++
//	}
//	for i = left; i <= right; i++ {
//        nums[i] = tmp[i-left]
//	}
//	return res
//}