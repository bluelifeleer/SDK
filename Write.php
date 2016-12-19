<?php
/**
 * |-----------------------------------------------------------------------------
 * | Write Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-19
 * |-----------------------------------------------------------------------------
 */
class Write {
	private $code;
	private $msg;
	private $data;
	public function __construct() {

	}

	public function __set($key, $value) {
		$this->$key = $value;
	}

	public function __get($key) {
		return isset($this->$key) ? $this->$key : null;
	}

	public function echo ($BF = false) {
		if (!$BF) {
			echo json_encode((object) array(
				'code' => $this->code,
				'msg' => $this->msg,
				'data' => $this->data,
			));
			exit;
		} else {
			echo json_encode((object) array(
				'code' => $this->code,
				'msg' => $this->msg,
				'data' => $this->data,
			));
		}
	}
}