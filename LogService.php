<?php
class LogService
{

	public static function saveLog($row = array()) {
		if (!is_array($row)) {
			error_log(date('Y-m-d H:i:s') . "\t saveLog: Param is not a row. \n", 3, APPLICATION_PATH . '/../public/log/istore2.log');
			return false;
		}
		$db = Zend_Registry::get('db');
		try{
			$db->insert('logs', $row);
		} catch (Exception $e) {
			$strRow = json_encode($row);
			error_log(date('Y-m-d H:i:s') . "\t saveLog: row = $strRow, {$e->getMessage()} \n", 3, APPLICATION_PATH . '/../public/log/istore2.log');
			return false;
		}
		return true;
	}


	/**
	 * 添加日志，保存到内存中的
	 * @author zhjx 
	 * @param string|array|object $msg 需要添加的日志,
	 * 当bool类型并且是true的时候清空日志,false的时候关闭日志,数字0是清空日志,不影响原来的设置，数字1是清空并且开启日志
	 */
	public static function add($msg=null)
	{		
		static $_save = true;
		static $_listLog = array();

		if(is_null($msg))
		{
			return $_listLog;

		}elseif(is_bool($msg)){
			$_save = $msg;
			return $_save;		

		}elseif(is_numeric($msg) && $msg == 0){
			$_listLog = array();
			return $_save;

		}elseif(is_numeric($msg) && $msg == 1){
			$_listLog = array();
			$_save = true;
			return $_save;

		}else{
			$debug_trace = debug_backtrace();
			$calledClassMethodInfo = $debug_trace[1];
			if(is_array($msg))
			{
				$msg = json_encode($msg);
			}
			else{
				$msg = (string)($msg);
			}

			$oneLog = array(
				//'level'=>$level,
				'time'=>date("y-m-d H:i:s"),
				'seconds'=>time(),
				'msg'=>$msg,
				'class'=>isset($calledClassMethodInfo['class'])?$calledClassMethodInfo['class']:'',
				'func'=>isset($calledClassMethodInfo['function'])?$calledClassMethodInfo['function']:'',
				'file'=>isset($calledClassMethodInfo['file'])?$calledClassMethodInfo['file']:'',
				'line'=>isset($calledClassMethodInfo['line'])?$calledClassMethodInfo['line']:'',
			);
			if($_save){
				$_listLog[] = $oneLog;
			}		

			return $oneLog;
		}			
	}
}