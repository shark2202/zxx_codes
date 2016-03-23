<?php

define("ROOT",getcwd());

require_once 'vendor/autoload.php';
Twig_Autoloader::register();

/*载入文件目录*/
$loader = new Twig_Loader_Filesystem(ROOT."/template");
/*配置运行环境参数*/
$twig = new Twig_Enviroment($loader,array(
	'cache'=>"template/cache"
));
echo "ok";die;
$template = $twig->loadTemplate("index.html");
echo $template->rander();