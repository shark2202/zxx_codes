<?php

/**
 * 调试日志
 * Class Log_Shark 2016-03-07
 */

class Zxx_log{

	private static $_enable = true;
    private static $_log = '';

	/**
	* $log 可以是true，false或者string类型
	*/
    public static function log($log=null){
        if(null === $log)
        {
            return $GLOBALS['debug_zxx'];
        }
		elseif(is_bool($log))//关闭记录到内存中
		{
			self::$_enable = $log;
		}
        else{
            $debug_trace = debug_backtrace();
			
            $log = '#file:'.$debug_trace[0]['file'].$debug_trace[0]['line'].'#<br/>'.
                '#time:'.date('Y-m-d H:i:s').'#<br/>'.
                '#log:'.$log.'#<br/>';
			
			if(self::$_enable)
			{				
				self::$_log .= $log;
			}				
            return $log;
        }
    }

    public static function write($log=null){
        $log_file = dirname(__FILE__).DIRECTORY_SEPARATOR.'log_zxx.html';
        file_put_contents($log_file,self::$_log,FILE_APPEND);
    }

    public static function register(){
        register_shutdown_function('Zxx_log::write');
    }

    public static function clean(){
        self::$_log = '';
        $log_file = dirname(__FILE__).DIRECTORY_SEPARATOR.'log_zxx.html';
        file_put_contents($log_file,self::$_log);
    }
}
Zxx_log::register();

if($_GET["clean"] == 1)
{
	Zxx_log::clean();
}

echo "Zxx_log!";