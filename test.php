<?php

var_dump(10 > 9*1.2);
exit;

$arr = array('上海','北京','深圳');
$current = 2;
$str = "";

foreach($arr as $k=>$v){
	$str .= "<option value='{$k}'";
	if($k == $current)
	{
		$str .= " selected ";
	}
	$str .= ">{$v}</option>";
}
?>

<select name="select">
<?php echo $str?>
</select>

<?php 
$arr = array(1,2,3);
var_dump(array_chunk($arr,4));
