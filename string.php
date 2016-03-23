<?php
//字符串函数

//查询字符
echo strpos("goods","o");//从左边开始查询
echo "<br/>";

echo stripos("GOODS","o");//大小写不敏感的
echo "<br/>";

echo strrpos("goods",'o');//从右边开始查询
echo "<br/>";

//查询字符串子串
echo strstr("123@qq.com","@qq");//查询子串
echo "<br/>";
echo strstr("123@qq.com","@qq",true);//查询子串,之前的信息
echo "<br/>";
//stristr 不区分大小写的

echo strpbrk('abcdefg','gd');//只要有第二个字符中任意一个都可以的
echo "<br/>";

echo implode(array(1,2,3,4),'#');//数组转换到字符串 ==> join
echo "<br/>";

print_r(explode(',',"1,2,3,4"));//字符串转换为数组,分割符在前面

//分割字符串
echo chunk_split("1234567890",3);//结果还是字符串
echo "<br/>";
echo wordwrap("1234 567890 abcdef ghijk",2);
echo "<br/>";

echo strlen("1234");//字符串长度
echo "<br/>";

//echo count("123");//元素的个数，就是1
//echo count(1);
//echo count(null); //0
//echo count(false);//1
//echo count(true);//1
