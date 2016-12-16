<?php
/**
 * |-----------------------------------------------------------------------------
 * | MySqliDB Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class MySqliDB extends mysqli {
	private $where;
	private $table;
	private $select;
	private $sql;
	private $result;

	public function __construct($host, $user, $passwd, $db_name, $port) {
		parent::__construct($host, $user, $passwd, $db_name, $port);
		if (!$this->get_charset()) {
			self::set_charset('utf-8');
		}
	}

	public function __set($key, $value) {
		$this->$key = $value;
	}

	public function __get($key) {
		return isset($this->$key) ? $this->$key : null;
	}

	public function get_charset() {
		return self::character_set_name();
	}

	public function select($fields = array('*')) {
		$tmp = '';
		foreach ($fields AS $key => $value) {
			$tmp .= $value . ',';
		}
		$this->select = 'SELECT ' . substr($tmp, 0, intval(strlen($tmp) - 1)) . ' FROM ';
	}
	public function get() {
		$this->sql = $this->select . $this->table;
		$this->result = self::query($this->sql);
	}
}