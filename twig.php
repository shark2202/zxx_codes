<?php

define("ROOT",getcwd());

require_once 'vendor/autoload.php';
Twig_Autoloader::register();

/*�����ļ�Ŀ¼*/
$loader = new Twig_Loader_Filesystem(ROOT."/template");
/*�������л�������*/
$twig = new Twig_Enviroment($loader,array(
	'cache'=>"template/cache"
));
echo "ok";die;
$template = $twig->loadTemplate("index.html");
echo $template->rander();