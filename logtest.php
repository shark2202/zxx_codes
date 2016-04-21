<?php
include_once 'Zxx_log.php';

function testLog(){
	$logMsg = "测试日志信息123";
	Zxx_log::log($logMsg);
}


class Ztest{
	public function testLog(){
		$logMsg = "测试日志信息";
		Zxx_log::log($logMsg);
		//
		//testLog();
	}

	public static function sTestLog(){
		$logMsg = "测试日志信息";
		Zxx_log::log($logMsg);
		

		//testLog();
	}
}
echo "这个是直接使用方法的：","<br/>";
testLog();

//echo "11111111111111111";
//$t->testLog();
//echo "22222222222222222";
//$t::sTestLog();
//echo "33333333333333333";
echo "这个是使用 call_user_func 调用的：","<br/>";
call_user_func('testLog');

echo "这个是类调用的 call_user_func :","<br/>";
$t = new Ztest();
call_user_func(array($t,'testLog'));

echo "这个是类调用的 反射 :","<br/>";
$class = new ReflectionClass("Ztest");
$instance = $class->newInstanceArgs();
$method = $class->getmethod('testLog');
$method->invoke($instance);

echo "特殊的使用方法了";
