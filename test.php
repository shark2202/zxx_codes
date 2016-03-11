<?php

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
