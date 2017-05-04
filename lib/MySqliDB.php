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
	private $data;
	private $where;
	private $table;
	private $db_name;
	private $select;
	private $from;
	private $like;
	private $limit;
	private $update;
	private $insert;
	private $join;
	private $sql;
	private $result;
	private $status;

	public function __construct($host, $user, $passwd, $db_name, $port) {
		$this->db_name = $db_name;
		//初始化并连接数据库
		parent::__construct($host, $user, $passwd, $db_name, $port);
		//检测并设置数据库的字符编码为'utf-8'
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

	/**
	 * 获取默认使用的字符集
	 * @return [type] [description]
	 */
	public function get_charset() {
		return self::character_set_name();
	}

	/**
	 * 设置select语句
	 * @param  array  $fields [description]
	 * @return [type]         [description]
	 */
	public function select($fields = array('*')) {
		$tmp = '';
		foreach ($fields AS $key => $value) {
			$tmp .= $value . ',';
		}
		$this->select = 'SELECT ' . substr($tmp, 0, intval(strlen($tmp) - 1));
	}

	/**
	 * 设置from语句
	 */
	public function from($table) {
		$this->from = ' FROM `' . $this->db_name.'`.`'.$table.'`';
	}

	/**
	 * 设置where语句
	 * @return [type] [description]
	 */
	public function where() {
		if (func_num_args() == 2) {
			$this->where = ' WHERE ' . func_get_arg(0) . '=' . func_get_arg(1);
		} else {
			$tmp = ' WHERE ';
			foreach (func_get_arg(0) AS $key => $value) {
				$tmp .= sprintf('%s=%s,', $key, $value);
			}
			$this->where = mb_substr($tmp, 0, intval(strlen($tmp) - 1));
		}
	}

	/**
	 * 设置like语句
	 * @param  [type] $key   [description]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function like($key, $value) {
		$this->like = $key . ' LIKE "%' . $value . '%"';
	}

	/**
	 * 设置limit语句
	 * @param  [type] $num    [description]
	 * @param  [type] $offset [description]
	 * @return [type]         [description]
	 */
	public function limit($num, $offset) {
		$this->limit = ' LIMIT ' . $offset . ',' . $num;
	}

	/**
	 * 设置数据
	 * @param array $data [description]
	 */
	public function set($data = array()) {
		$this->data = $data;
	}

	/**
	 * 获取最后一条执行的SQL语句
	 * @return [type] [description]
	 */
	public function last_query(){
		return $this->sql;
	}

	/**
	 * 执行更新
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function update($data = array()) {
		$tmp = '';
		foreach ($this->data AS $key => $value) {
			$tmp .= sprintf('%s=%s,', $key, $value);
		}
		$this->sql = trim('UPDATE ' . $this->table . ' SET ' . mb_substr($tmp, 0, intval(strlen($tmp) - 1)));
		$this->status = self::query($this->sql);
		return $this->status ? true : false;
	}

	/**
	 * 执行插入
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function insert($data = array()) {
		$field = array();
		$values = array();
		foreach ($this->data AS $key => $value) {
			array_push($field, $key);
			array_push($values, $value);
		}
		$this->sql = trim('INSERT INTO ' . $this->table . '(' . join(',', $field) . ') VALUES (' . join(',', $values) . ')');
		$this->status = self::query($this->sql);
		return $this->status ? true : false;
	}

	/**
	 * 查询操作
	 * @return [type] [description]
	 */
	public function get() {
		$this->sql = trim($this->select . $this->from . (isset($this->where) && !empty($this->where) ? $this->where : '') . $this->join . $this->limit);
		// var_dump($this->sql);
		$this->result = self::query($this->sql);
		return $this;
	}

	/**
	 * 将查询结果以关联数组形式返回
	 * @return [type] [description]
	 */
	public function array_result() {
		return $this->num_rows() && $this->num_rows() > 0 ? $this->result->fetch_all(MYSQLI_ASSOC) : array();
	}

	/**
	 * 返回结果集的个数
	 * @return [type] [description]
	 */
	public function num_rows() {
		return $this->result->num_rows;
	}

	/**
	 * 将一条结果用关联数组的方式返回
	 * @return [type] [description]
	 */
	public function fetch_assoc() {
		return $this->result->fetch_assoc();
	}

	/**
	 * 输出insert,update,delete受影响的数,insert返回自增id
	 * @return [type] [description]
	 */
	public function affected_rows() {
		return $this->affected_rows;
	}

	public function count_all($table){
		$this->sql = 'SELECT COUNT(*) FROM `'. $this->db_name.'`.`'.$table .'`'. $this->where;
		$this->result = self::query($this->sql);
		return intval($this->result->fetch_assoc()['COUNT(*)']);
	}

	public function join($table,$where,$type = 'left'){
		$this->join = ' ' . strtoupper($type) . ' JOIN `'. $this->db_name.'`.`'.$table . '` ON ' .$where;
	}

	/**
	 * 关闭数据库连接
	 */
	public function __destruct() {
		self::close();
	}
}