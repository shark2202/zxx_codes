<?php
/**
 * 将数字转为短网址代码
 * 
 * @param int $number 数字
 * @return string 短网址代码
 */
function generate_code($number) {
    $out   = "";
    $codes = "abcdefghjkmnpqrstuvwxyz23456789ABCDEFGHJKMNPQRSTUVWXYZ";

    while ($number > 53) {
        $key    = $number % 54;
        $number = floor($number / 54) - 1;
        $out    = $codes{$key}.$out;
    }

    return $codes{$number}.$out;
}

/**
 * 将短网址代码转为数字
 * 
 * @param string $code 短网址代码
 * @return int 数字
 */
function get_num($code){
    $codes = "abcdefghjkmnpqrstuvwxyz23456789ABCDEFGHJKMNPQRSTUVWXYZ";
    $num = 0;
    $i = strlen($code);
  for($j=0;$j<strlen($code);$j++){
		$i--;
		$char = $code{$j};
		$pos = strpos($codes,$char);
		$num += (pow(54, $i) * ($pos + 1));
	}
	$num--;
	return $num;
}
