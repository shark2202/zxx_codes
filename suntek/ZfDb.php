<?php
/**
 * zf框架的db操作例子
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-4-12
 * Time: 上午11:29
 */

require_once dirname(dirname(__FILE__)).'/config.php';

date_default_timezone_set('Asia/Shanghai');
header('Content-type: text/html; charset=utf-8');

class ZfDb {

    //查询操作
    public function getAll(){
        $db = Zend_Registry::get("db");
        $select = $db->select();
        $select->from("supplier_orders_tracking_number",null)
            ->columns(array('so_id',"tracking_number"))
            ->columns(array('tracking_number'))
            ->columns(array('so_id'));
        $select->where('shipcompany != ?',"")->limit(10);

        echo $select->__toString();//获得查询的语句信息
        /*下面都是查询结果*/
        /*结果集，是个数组*/
        $fetchAll = $db->fetchAll($select);//var_dump($fetchAll);
        /*单个结果，字段数组*/
        $fetchRow = $db->fetchRow($select);//var_dump($fetchRow);
        /*第一列的结果数组*/
        $fetchCol = $db->fetchCol($select);//var_dump($fetchCol);
        /*第一列的第一个字段的结果*/
        $fetchOne = $db->fetchOne($select);//var_dump($fetchOne);
        /*关联数组第一列是KEY*/
        $fetchAssoc = $db->fetchAssoc($select);//var_dump($fetchAssoc);
        /*第一列是key，第二列是value*/
        $fetchPairs = $db->fetchPairs($select);//var_dump($fetchPairs);

        /*下面是修改操作*/
        //$db->insert($table, array $bind);
        //$db->update($table, array $bind, $where = '')
        //$db->delete($table, $where = '');
    }


    //修改操作
    public function update(){
        $db = Zend_Registry::get("db");
        $where = $db->quoteInto("so_id = ?",'114954');

        $db->getProfiler()->setEnabled(true);
        $rowCount = $db->update('supplier_orders_tracking_number',array('shipcompany'=>"测试的公司"),$where);
        echo $db->getProfiler()->getLastQueryProfile()->getQuery();
        echo $rowCount;
    }
}

$cronTask = new ZfDb();
//$cronTask->getAll();
$cronTask->update();