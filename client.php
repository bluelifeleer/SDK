<?php
require_once __DIR__ . '/Mixer.php';
require_once __DIR__ . '/config.php';
/**
 * |-----------------------------------------------------------------------------
 * | Client Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class Client extends Mixer {
	public function __construct($config) {
		parent::__construct($config);
	}

	public function get() {
		var_dump($this->get_db());
	}
}

$client = new Client($config);
$client->get();