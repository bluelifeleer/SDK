<?php
$request_file_list = array('config.php','Mixer.php');
foreach ($request_file_list as $key => $value) {
	$file_path =  __DIR__ . DIRECTORY_SEPARATOR . $value;
	if(is_file($file_path)){
		require_once $file_path;
		echo 'loaded file '.$file_path.PHP_EOL;
	}
}

/**
 * |-----------------------------------------------------------------------------
 * | Client Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-19
 * |-----------------------------------------------------------------------------
 */
class client extends Mixer {
	public function __construct($config) {
		parent::__construct($config);
	}

	public function __get($key) {
		return isset($this->$key) ? $this->$key : null;
	}

	public function __set($key, $value) {
		$this->$key = $value;
	}
}

$client = new Client($config);

// $msg = $client->get_version();

// $Client->getCreatives();

$client->addCreatives();

// $Client->send_mailer($msg);
