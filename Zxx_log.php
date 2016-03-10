<?php

/**
 * µ÷ÊÔÈÕÖ¾
 * Class Log_Shark 2016-03-07
 */

class Zxx_log{

    private static $_log = '';

    public static function log($log=null){
        if(null === $log)
        {
            return $GLOBALS['debug_zxx'];
        }
        else{
            $debug_trace = debug_backtrace();
            $log = '#file:'.$debug_trace[0]['file'].$debug_trace[0]['line'].'#<br/>'.
                '#time:'.date('Y-m-d H:i:s').'#<br/>'.
                '#log:'.$log.'#<br/>';
            self::$_log .= $log;
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