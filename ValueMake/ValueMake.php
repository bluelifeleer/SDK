<?php
/**
 * |-----------------------------------------------------------------------------
 * | ValueMake Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class ValueMake {
	private $curl;
	private $conf;
	public function __construct($curl, $conf) {
		$this->curl = $curl;
		$this->conf = $conf;
	}
}