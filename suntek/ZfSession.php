<?php
/**
 * Zf框架的session管理
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-4-12
 * Time: 下午4:02
 */

require_once dirname(dirname(__FILE__)).'/config.php';

date_default_timezone_set('Asia/Shanghai');
header('Content-type: text/html; charset=utf-8');


class ZfSession{
    public function set(){
        //echo Zend_Session::getId();
        $session_default = new Zend_Session_Namespace();
        $session_default->ok = array(31,99);
        $session = new Zend_Session_Namespace("test");
        $session->test = "test";
    }

    public function get(){
        $session = new Zend_Session_Namespace("test");
        echo $session->test;

        $session_default = new Zend_Session_Namespace();
        var_dump($session_default->ok);
    }
}
$cronTask = new ZfSession();
$cronTask->set();
$cronTask->get();