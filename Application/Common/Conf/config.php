<?php
return array(
	//'配置项'=>'配置值'
    'default_module'     => 'Home', //默认模块
    'url_model'          => '1', // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'session_auto_start' => true, //是否开启session
    'LOAD_EXT_CONFIG' => 'db',// 加载单独的数据库配置文件
    'URL_CASE_INSENSITIVE' => true,// url忽略大小写
    'LOG_RECORD' => true, //开启日志记录
    'LOG_LEVEL' => 'EMERG,ALERT,CRIT,ERR', //只记录EMERG,ALERT,CRIT,ERR 错误
);