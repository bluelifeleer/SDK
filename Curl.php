<?php
/**
 * |-----------------------------------------------------------------------------
 * | Curl Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-19
 * |-----------------------------------------------------------------------------
 */
class Curl {
	private $header;
	private $http;
	private $data;
	private $response;
	private $request;
	private $curl;

	public function __construct() {
		$this->curl = curl_init();
	}

	public function get() {

		// var_dump($header);
		// var_dump($http);
		// exit;

		curl_setopt($this->curl, CURLOPT_URL, $this->http);
		is_array($this->header) && !empty($this->header) ? curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header) : null;
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_HEADER, 0);
		$response = curl_exec($this->curl);
		$status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
		curl_close($this->curl);
		$result = array(
			'code' => $status,
			'result' => $response,
		);
		// var_dump($result);
		return json_encode($result);
		exit;
	}

	public function post($header, $http, $data) {

		// var_dump($header);
		// var_dump($http);
		// var_dump($data);
		// exit;

		curl_setopt();
		is_array($this->header) && !empty($this->header) ? curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->header) : null;
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $this->data);
		$response = curl_exec($this->curl);
		$status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
		curl_close($this->curl);
		$result = array(
			'code' => $status,
			'result' => $response,
		);
		// var_dump($result);
		return json_encode($result);
		exit;
	}
}