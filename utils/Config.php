<?php
namespace Utils;

/**
 * 二维码配置类
 */
class Config{

	private $margin = 3;//二维码白色边框尺寸,缺省值: 3px
	private $errorLevel = [
		'L',	//L水平    7%的字码可被修正
		'M',	//M水平    15%的字码可被修正
		'Q',	//Q水平    25%的字码可被修正
		'H'		//H水平    30%的字码可被修正
	];
	private $pointSize = 8;	//二维码尺寸,1-10,默认为8

	public function getErrorLevels()
	{
		return $this->errorLevel;
	}

	public function getDefaultErrorLevel()
	{
		return 'H';
	}

	public function getDefaultMargin()
	{
		return $this->margin;
	}

	public function getDefaultPointSize()
	{
		return $this->pointSize;
	}
}