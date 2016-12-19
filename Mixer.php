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
	private $curl;
	private $write;
	private $valueMake;
	private $adinall;
	private $bes;
	private $tanx;
	private $miaozhen;
	public function __construct($config) {
		$this->conf = $config;
		$this->error_code = '';
		$this->db = new MySqliDB($this->conf['db']['host'], $this->conf['db']['user'], $this->conf['db']['passwd'], $this->conf['db']['db_name'], $this->conf['db']['port']);
		$this->curl = new Curl();
		$this->write = new Write();
		$this->valueMake = new ValueMake();
		$this->adinall = new Adinall();
		$this->bes = new BaiDuBES();
		$this->tanx = new Tanx();
		$this->miaozhen = new MiaoZhen();
	}

	public function get_db() {
		var_dump($this->db);
	}

	public function get_version() {
		foreach ($this->conf['ver'] AS $key => $value) {
			echo ucwords($key) . ':' . $value . PHP_EOL;
		}
	}
}