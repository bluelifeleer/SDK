<?php
namespace SDK\Tanx;

/**
 * |-----------------------------------------------------------------------------
 * | Tanx Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class Tanx {
	private $db;
	private $curl;
	private $conf;
	public function __construct($db, $curl, $conf) {
		$this->db = $db;
		$this->curl = $curl;
		$this->conf = $conf;
	}

	public function main($data){
		var_dump($data);
	}
}