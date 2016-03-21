<?php
ini_set("display_errors",1);
error_reporting(E_ALL);
/* 返回生成器 */
function my_range($start, $end, $step = 1) {
    for ($i = $start; $i <= $end; $i += $step) {
        yield $i;
    }
}

//foreach (my_range(1, 10) as $num) {
//    echo $num, "\n";
//}

$range = my_range(1,100);
var_dump($range);//object(Generator)#1 (0) { }
echo "<br/>";

//
echo "第一个","<br/>";
echo $range->current(),"<br/>";
echo $range->key(),"<br/>";

echo "第二个","<br/>";
$range->next();
echo $range->current(),"<br/>";
echo $range->key(),"<br/>";

//无法在运行中的生成器使用rewind方法
//echo "回到第一个","<br/>";
//$range->rewind();
//echo $range->current(),"<br/>";
//echo $range->key(),"<br/>";

/* 生成器接受值 通过send发送*/
function gen(){
	//第一个send是从这开始的
	$ret = (yield);
	var_dump($ret);

	//第二次send是从这开始的
	$ret1 = (yield 'yield2');
    var_dump($ret1);	
}

//$gen = gen();

//$ret = $gen->current(); var_dump($ret);

//$ret = $gen->send("test1"); var_dump($ret);

//$gen->next();

//$gen->current();

//$gen->send("test12222");

//$gen->send("test222244444");

//$gen->send("test444444444444444444");

//接受并返回值
function gen_new(){
	
	echo "11111";
	$value = (yield 0);//这个是进入，一个yield进入一次
	var_dump($value);
	
	echo "2222";
	$value1 = (yield 1);
	var_dump($value1);
	
	echo "3333";
	yield ++$value;//这个是退出，一个yield退出一次
	
	echo "4444";
	yield 10*$value1;
}

$g = gen_new();
$ret = $g->send(100);
var_dump($ret);
$ret = $g->current();
var_dump($ret);

$ret = $g->send(123);
var_dump($ret);
$ret = $g->current();
var_dump($ret);

