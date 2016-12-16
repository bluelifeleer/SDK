<?php
require_once __DIR__ . '/autoLoad.php';
/**
 * |-----------------------------------------------------------------------------
 * | Mixer Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class Mixer {
	private $conf;
	private $error_code;
	private $db;
	private $valueMake;
	private $adinall;
	private $bes;
	private $tanx;
	public function __construct($config) {
		$this->conf = $config;
		$this->error_code = '';
		var_dump($this->conf);
		$this->db = new MySqliDB($this->conf['db']['host'], $this->conf['db']['user'], $this->conf['db']['passwd'], $this->conf['db']['db_name'], $this->conf['db']['port']);
	}

	public function get_db() {
		var_dump($this->db);
	}
}