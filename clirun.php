<?php
/**
 就是在浏览器关闭的情况下页可以运行程序，在ajax的环境呢？


*/

ignore_user_abort(true); // 后台运行
set_time_limit(0); // 取消脚本运行时间的超时上限
echo 'start.';
sleep(1000);
echo 'end.';