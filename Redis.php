<?php
/**
 * |---------------------------------------------------------------------------------
 * |	Redis Class
 * |---------------------------------------------------------------------------------
 * |	Author bulelife
 * |	Date 2017-02-06
 * |	Email thebulelife@outlook.com
 * |---------------------------------------------------------------------------------
 */
class PHPRedis extends redis {
	public function __construct($conf) {
		parent::__construct();
		if ($conf['pconnect']) {
			$this->pconnect($conf['host'], $conf['port']);
		} else {
			$this->connect($conf['host'], $conf['port']);
		}
	}
}