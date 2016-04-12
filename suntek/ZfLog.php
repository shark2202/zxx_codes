<?php
/**
 * ZF操作log的例子
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-4-12
 * Time: 下午3:13
 */

require_once dirname(dirname(__FILE__)).'/config.php';

date_default_timezone_set('Asia/Shanghai');
header('Content-type: text/html; charset=utf-8');

class ZfLog{

    public function log(){
        /*初始化写入器
         * mock
         * null 丢弃
         * db 数据库
         * syslog 系统日志,和系统有关的，不是php这个系统，指操作系统
         * firbug firbug日志
        */
        $log_writer = Zend_Log_Writer_Mock::factory(array());
        $syslog_writer = Zend_Log_Writer_Syslog::factory(array());

        /*加入写入器*/
        $log = Zend_Log::factory(array($log_writer));
        $log->addWriter($syslog_writer);

        /*写入日志*/
        $log->log("test123",Zend_Log::DEBUG);

        //mock的日志保存在events属性中，是个数组
        var_dump($log_writer->events);
    }
}

$cornTask = new ZfLog();
$cornTask->log();