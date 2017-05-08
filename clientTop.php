<?php

class clientTop {
	private $ch;

	public function __construct(){
		$this->ch = curl_init();
	}

	public function exec(){
		var_dump($this->ch);
	}

	public function __destruct(){
		curl_close($this->ch);
	}
}