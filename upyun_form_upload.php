<?php
    class upyun_form_upload {
        private $policy = [];
        private $secret_key;
        function __construct($secret_key){
            $this->secret_key = $secret_key;
        }
        function __call($function_name, $params){
            $key = $this->underscore2hyphen($function_name);
            if (!empty($params)) {
                $param = array_shift($params);
            } else {
                return $this->policy[$key];
            }
            $this->policy[$key] = $param;
            return $this;
        }
        private function underscore2hyphen($name){
            return str_replace('_', '-', $name);
        }
        private function encode_policy($policy){
            $policy = json_encode($policy);
            return base64_encode($policy);
        }
        private function signature($secret_key) {
            $signature = $this->encode_policy($this->policy).'&'.$secret_key;
            $signature = md5($signature);
            return $signature;
        }
        function get_form_fields(){
            $field = [
                'signature'=>$this->signature($this->secret_key),
                'policy'=>$this->encode_policy($this->policy)
            ];
            return $field;
        }
        public function __toString() {
            return http_build_query($this->get_fields());
        }
    }
    $upyun = new upyun_form_upload('密钥'); #表单的密钥，在通用->基本设置->表单功能设置里获取
    $bucket='你的 bucket 名称';

    $form = $upyun
        ->bucket($bucket)
        ->save_key('/img/{filemd5}{.suffix}') #路径规则
        ->expiration(time() + 60*10) #10分钟后过期
        ->content_length_range('1024, 20480000')
        ->x_gmkerl_exif_switch(true) #保留 exif 信息
        ->x_gmkerl_type('fix_width')
        ->x_gmkerl_value(1200)
        ->get_form_fields();
    # API 文档地址 http://docs.upyun.com/api/form_api/
?>
<form method="post" action="http://v0.api.upyun.com/<?=$bucket?>" enctype="multipart/form-data">
    <?php foreach($form as $field=>$value): ?>
    <input type="hidden" name="<?=$field?>" value="<?=$value?>" />
    <?php endforeach; ?>
    <input type="file" name="file" />
    <button type="submit">上传</button>
</form>        