<?php

/**
 * 自动执行任务
 */
class CronRun {
	
	// 单个任务最大执行时间
    protected static $options   =  array(
            'CRON_MAX_TIME' =>  60, 
        );
		
		
    public function run(&$params) {
        // 锁定自动执行，使用文件标记
        $lockfile	 =	 RUNTIME_PATH.'cron.lock';
        if(is_writable($lockfile) 
			&& filemtime($lockfile) > $_SERVER['REQUEST_TIME'] - self::$options['CRON_MAX_TIME']) {
            return ;
        } else {
            touch($lockfile);
        }
		
		//设置脚本超时时间
        set_time_limit(1000);
		//浏览器关闭继续执行脚本
        ignore_user_abort(true);

        // 载入cron配置文件
        // 格式 return array(
        // 'cronname'=>array('filename',intervals,nextruntime),...
        // );
        if(is_file(RUNTIME_PATH.'~crons.php')) {
            $crons	=	include RUNTIME_PATH.'~crons.php';
        }elseif(is_file(CONF_PATH.'crons.php')){
            $crons	=	include CONF_PATH.'crons.php';
        }
		
		//遍历任务  0任务的文件，1时间间隔，2下次运行时间
        if(isset($crons) && is_array($crons)) {
            $update	 =	 false;
            $log	=	array();
            foreach ($crons as $key=>$cron){
                if(empty($cron[2]) || $_SERVER['REQUEST_TIME']>=$cron[2]) {
                    // 到达时间 执行cron文件
                    G('cronStart');
                    include LIB_PATH.'Cron/'.$cron[0].'.php';
                    $_useTime	 =	 G('cronStart','cronEnd', 6);
                    // 更新cron记录
                    $cron[2]	=	$_SERVER['REQUEST_TIME']+$cron[1];
                    $crons[$key]	=	$cron;
                    $log[] = "Cron:$key Runat ".date('Y-m-d H:i:s')." Use $_useTime s\n";
                    $update	 =	 true;
                }
            }
            if($update) {
                // 记录Cron执行日志
                Log::write(implode('',$log));
                // 更新cron文件
                $content  = "<?php\nreturn ".var_export($crons,true).";\n?>";
                file_put_contents(RUNTIME_PATH.'~crons.php',$content);
            }
        }
        // 解除锁定
        unlink($lockfile);
        return ;
    }
}