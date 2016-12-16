<?php

class AutoLoad {
	private $require_files;
	public function __construct() {
		$this->require_files = array('MySqliDB', 'exception', 'Adinall/Adinall', 'BaiDuBES/BaiDuBES', 'MiaoZhen/MiaoZhen', 'Tanx/Tanx', 'ValueMake/ValueMake');
	}

	public function AutoLoading() {
		foreach ($this->require_files AS $key => $value) {
			if ($value && !empty($value)) {
				require_once './' . $value . '.php';
				echo 'loading ' . $value . '.php success .' . PHP_EOL;
			} else {
				continue;
			}
		}
		return;
	}
}

$autoLoad = new AutoLoad();
$autoLoad->AutoLoading();
// spl_autoload_register('AutoLoad::AutoLoading');