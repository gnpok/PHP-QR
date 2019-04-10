<?php

require_once dirname(__FILE__).'/../vendor/autoload.php';
use Utils\Config;
use Utils\Response;
use \NoahBuscher\Macaw\Macaw;

Macaw::get('/qrcode', function() {
	$config = new Config();
	$url        = isset($_GET["url"]) ? $_GET["url"] : '';
	$errorLevel = isset($_GET["e"]) ? $_GET["e"] : $config->getDefaultErrorLevel();
	$PointSize  = isset($_GET["p"]) ? intval($_GET["p"]) : $config->getDefaultPointSize();
	$margin     = isset($_GET["m"]) ? intval($_GET["m"]) : $config->getDefaultMargin();	

	/** 检验参数*/
	if(empty($url)){
		return Response::json(0,'GET参数url的值不能为空！');
	}
	if(!in_array($errorLevel, $config->getErrorLevels())){
		return Response::json(0,"GET参数e的值不正确！");
	}
	if($PointSize < 0 || $PointSize > 10){
		return Response::json(0,"GET参数p的值不正确！");
	}

	//生成二维码
	createqr($url, $errorLevel, $PointSize, $margin);
});

//路由未匹配404
Macaw::error(function() {
	return Response::json(0,"404 :: Not Found");
});

Macaw::dispatch();

