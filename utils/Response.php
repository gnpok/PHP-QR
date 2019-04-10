<?php
namespace Utils;
/**
 * 返回数据
 */
class Response
{
	public static function json($code = 0 ,$msg = '',$data = [])
	{
		$status = ($code == 0) ? 'ERROR' : 'SUCCESS';
		$resp = compact('status','msg','data');
		header('Content-Type:application/json; charset=utf-8');
		echo json_encode($resp,JSON_UNESCAPED_UNICODE);
		return ($code == 0) ? false : true;
	}	

}