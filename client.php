<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/Mixer.php';
/**
 * |-----------------------------------------------------------------------------
 * | Client Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-19
 * |-----------------------------------------------------------------------------
 */
class Client extends Mixer {
	public function __construct($config) {
		parent::__construct($config);
	}

	public function __get($key) {
		return isset($this->$key) ? $this->$key : null;
	}

	public function __set($key, $value) {
		$this->$key = $value;
	}

	public function version() {
		$this->get_version();
	}

	public function get_dbs() {
		// $this->get_db();
		//
		// var_dump(strpos(__DIR__, '\\') === FALSE ? __DIR__ : str_replace('\\', '/', __DIR__));
		//
		var_dump(dirname(__FILE__) . DIRECTORY_SEPARATOR);
		// var_dump(__FILE__);
	}

	public function get() {
		$this->getCreatives();
	}
}

$Client = new Client($config);
// $Client->version();
// $Client->get_dbs();
$Client->get();