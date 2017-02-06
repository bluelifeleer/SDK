<?php
/**
 * |-----------------------------------------------------------------------------
 * | AutoLoad Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class AutoLoad {
	private $path;
	private $require_files;
	public function __construct() {
		// $this->require_files = array('Curl', 'Write', 'MySqliDB', 'SDKException', 'Adinall' . DIRECTORY_SEPARATOR . 'Adinall', 'BaiDuBES' . DIRECTORY_SEPARATOR . 'BaiDuBES', 'MiaoZhen' . DIRECTORY_SEPARATOR . 'MiaoZhen', 'Tanx' . DIRECTORY_SEPARATOR . 'Tanx', 'ValueMake' . DIRECTORY_SEPARATOR . 'ValueMake');
		$this->require_files = array('Curl', 'Write', 'MySqliDB', 'SDKException', 'Adinall/Adinall', 'BaiDuBES/BaiDuBES', 'MiaoZhen/MiaoZhen', 'Tanx/Tanx', 'ValueMake/ValueMake');
	}

	public function AutoLoading() {
		foreach ($this->require_files AS $key => $value) {
			if ($value && !empty($value)) {
				// Can`t usr __DIR__ as it`s only in PHP 5.3+
				// 根据系统确定使用什么分隔符
				// $this->path = dirname(__FILE__) . DIRECTORY_SEPARATOR;
				// 强制转换成‘/’做为分隔符
				$this->path = strpos(dirname(__FILE__), '\\') === FALSE ? __DIR__ : str_replace('\\', '/', __DIR__);
				require_once $this->path . '/' . $value . '.php';
				echo 'loading ' . $this->path . '/' . $value . '.php success .' . PHP_EOL;
			} else {
				continue;
			}
		}
		return;
	}
}

// $autoLoad = new AutoLoad();
// $autoLoad->AutoLoading();
spl_autoload_register('AutoLoad::AutoLoading');