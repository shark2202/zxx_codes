<?php
/**
 * Created by PhpStorm.
 * User: shark
 * Date: 2016/3/10 0010
 * Time: 9:32
 */

/**
 * 通过http请求的一种验证方式
 * 通过请求的key-value生成http_query查询字符串再shal化，对比sign_key和生成的shal串是否相同
 * Class ApiBaseAction
 */
class ApiBaseAction{

    public $sort_data = '';
    public $token;

    /**
     * 验证接口提交的数据
     * 清理并保存有效数据
     */
    protected function _initialize(){

        $now_time = gmtime();
        $timestamp = $_POST['request_time'];
        if(empty($timestamp))
        {
            echo "request_time验证失败";
        }

        if($now_time - $timestamp > 60)
        {
            echo "请求已过期";
        }

        $sign_key = $_POST['sign_key'];//验证的key
        unset($_POST['sign_key']);

        $_POST['salt'] = 'khbcms';//增加盐值

        $this->sort_data = $_POST;
        ksort($this->sort_data);
        $new_sign_key = sha1(http_build_query($this->sort_data));//生成shal码

        if($sign_key!==$new_sign_key){//验证不通过
            echo 'API验证失败';
        }

        $this->token = $this->sort_data['token'];

        if(empty($this->token)){
            echo 'token不能为空';
        }
    }
}