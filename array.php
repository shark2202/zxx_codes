<?php
//数组函数

//排序
// sort rsort usort asort 

//数组操作函数

$arr = array(1);
array_push($arr,2,3,4);//入栈
array_pop($arr);//出栈

array_unshift($arr,4,5,6);//加在队列的头部，从左往右
array_shift($arr);//从头部移除

unset($arr[3]);//删除指定的元素

//数组和子数组操作
array_slice($arr,1);//从数组中取出一段
array_splice($arr,1,10);//从数组中移除一段，获取替换一段

array_combine(array(1),array("one"));//键-值合并到数组

array_merge(array(10),array(20),array(30));//多个数组合并，相同的键的值后面覆盖前面的值 但是数组键的值会加到后面！
//array_merge_recursive() 递归合并，相同键的值会合并到数组中

array_chunk($arr,2);//分割数组到子数组，指定长度的

array_fill(1,10);//使用指定的值填充数组到指定的长度
array_fill_keys(array(22,"100"),100);//使用制定的键数组和值填充数组

shuffle($arr);//打乱数组
array_rand($arr);//随机获取数组的键名，可以指定个数

//数组的差集和交集
array_intersect(array(1,2,3),array(2,3,4));//这个是比较值的，保留键-值关系，第一个数组是基准
//相同的比较是(string)$e1 === (string)$e2 是相同的？？？

array_diff(array(1,2,3,4),array(2,3));//比较值的差集，以第一个数组为基准的

//array_intersect_key() 只比较键
//array_intersect_assoc() 比较键和值 都是严格比较的

//array_interscet_ukey() 自定义方法比较键
//array_uintersect() 用户自定义函数比较值
//array_uinterscet_assoc() 自定义函数比较键-值


//array_diff 差集，比较值
//array_diff_key 差集比较键
//array_diff_assoc 差集键和值都比较
//array_diff_ukey 自定义比较键
//array_diff_uassoc 自定义键和值都比较，自定义只用于值的比较，同时要求键也要相等
//array_udiff 自定义比较值，不管键是否相等
//aray_udiff_assoc 自定义比较值，键也比较
//array_udiff_uassoc 自定义比较键和值

