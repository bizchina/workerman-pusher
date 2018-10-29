<?php
/**
 * 打印可能要用到的<pre>开始标签
 */
function echoPossibleStartPreLable()
{
    if(PHP_SAPI != 'cli')  echo "<pre>";
    if(PHP_SAPI == 'cli')  echo PHP_EOL;
}

/**
 * 打印可能要用到的</pre>结束标签
 */
function echoPossibleEndPreLable()
{
    if(PHP_SAPI != 'cli')  echo "</pre>" . str_repeat("=", 100) . PHP_EOL;
    if(PHP_SAPI == 'cli')  echo PHP_EOL  . str_repeat("=", 100) . PHP_EOL;
}

/**
 * 打印人性化数据结构: var_dump();exit;
 */
function ddump($data = null)
{
    if(count(func_get_args()) > 1) 
    {
		$data = func_get_args();
	}

    echoPossibleStartPreLable();
	var_dump($data);
    echoPossibleEndPreLable();
    exit;
}

/**
 * 打印人性化数据结构: var_dump(); pp()函数别名;
 */
function vdump($data = null)
{
    if(count(func_get_args()) > 1) 
    {
		$data = func_get_args();
	}

    echoPossibleStartPreLable();
	var_dump($data);
    echoPossibleEndPreLable();
}

/**
 * 打印人性化数据结构并中断运行
 */
function dprint($data = null)
{
    if(count(func_get_args()) > 1) 
    {
		$data = func_get_args();
	}

    echoPossibleStartPreLable();
	print_r($data);
    echoPossibleEndPreLable();
	exit;
}

/**
 * 打印人性化数据结构
 */
function pprint($data = null)
{
    if(count(func_get_args()) > 1) 
    {
		$data = func_get_args();
	}

    echoPossibleStartPreLable();
	print_r($data);
    echoPossibleEndPreLable();
}

/**
 * 递归检测目录
 *
 * @param  string  $dir
 *
 * @return array
 */
function scanDirectory($dir)
{
	static $box;

	$handle = opendir($dir);

	while(false !== ($entry = readdir($handle)))
	{
		//过滤 (.|..|svn) 等目录
		$mode = "/(^\.{1,2}$|svn)/is";

		if(preg_match($mode, $entry))
		{
			continue;
		}

		$tmp = $dir . '/' . $entry;
		if(is_dir($tmp))
		{
			scanDirectory($tmp);
		}
		else
		{
			$name = substr($entry, 0, strpos($entry, '.'));
			if(preg_match('/php$/', $tmp))
			{
				$_name = strtolower($name);
				$box[$_name] = $tmp;
			}
		}
	}

	return $box;
}



