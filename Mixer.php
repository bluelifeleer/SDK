<?php
$file = str_replace('\\', DIRECTORY_SEPARATOR, __DIR__ . DIRECTORY_SEPARATOR) . 'Autoloader.php';
if(is_file($file)){
	require_once $file;
}
// use SDK\ValueMake;
// use SDK\BaiDuBES;
// use SDK\Tanx;
// use SDK\MiaoZhen;
// use SDK\Adinall;


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
	private $redis;
	private $miaozhen;
	public function __construct($config) {
		$this->conf = $config;
		$this->error_code = '';
		$this->db = new MySqliDB($this->conf['db']['host'], $this->conf['db']['user'], $this->conf['db']['passwd'], $this->conf['db']['db_name'], $this->conf['db']['port']);
		$this->curl = new Curl();
		$this->write = new Write();
		$this->valueMake = new SDK\ValueMake\ValueMake($this->curl, $this->conf['vm']);
		$this->adinall = new SDK\Adinall\Adinall($this->curl, $this->conf['adinall']);
		$this->bes = new SDK\BaiDuBES\BaiDuBES($this->curl, $this->conf['bes']);
		$this->tanx = new SDK\Tanx\Tanx($this->curl, $this->conf['tanx']);
		$this->miaozhen = new SDK\MiaoZhen\MiaoZhen($this->curl, $this->conf['mz']);
		// $this->redis = new PHPRedis($this->conf['redis']);
	}


	public function get_version() {
		foreach ($this->conf['ver'] AS $key => $value) {
			echo ucwords($key) . ':' . $value . PHP_EOL;
		}
	}


	public function getCreatives() {
		$this->db->select(array('*'));
		$this->db->from('diy_ad_task');
		// $this->db->where('status',1);
		$this->db->limit(20, 0);
		// $this->db->get();
		$count = $this->db->count_all('diy_ad_task');
		var_dump($this->db->last_query());
		var_dump($count);
		// $query = $this->db->array_result();
		// var_dump($query);
	}
}