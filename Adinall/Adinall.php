<?php
/**
 * |-----------------------------------------------------------------------------
 * | Adinall Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class Adinall {
	private $conf;
	private $curl;
	private $header;
	private $http;
	private $id;
	private $publicKey;
	private $signTime;
	private $token;
	private $dsptype;
	private $cid;
	private $size;
	private $category;
	private $html;
	private $domain;
	private $adtype;
	private $description;
	private $title;
	private $clickreport;
	private $impressionreport;
	private $imgurl;
	private $ldp;
	private $date;
	private $request;
	private $data = [];
	public function __construct($curl, $conf) {
		$this->curl = $curl;
		$this->conf = $conf;
	}

	/**
	 * 聚告PMP 提供的dspid，由32 位字符串组成
	 * @param  [string] $id [description]
	 * @return [type]     [description]
	 */
	public function id($id) {
		$this->id = $id;
	}
	/**
	 * 设置密钥
	 * @param  [type] $publicKey [description]
	 * @return [type]            [description]
	 */
	public function publicKey($publicKey) {
		$this->publicKey = $publicKey;
	}

	/**
	 * Unix 时间戳，10 位数字格式
	 * @param  [member] $timer [description]
	 * @return [type]        [description]
	 */
	public function signTime($timer) {
		$this->timer = $timer;
	}
	/**
	 * 设置token;算法为:md5(id+publicKey+signTime)，注意字段md5 顺序
	 * @param  [string] $token [description]
	 * @return [type]        [description]
	 */
	public function token($token) {
		$this->token = $token;
	}
	/**
	 * 必填项，1、pc 2 、wap 3、APP
	 * @param  [member] $dsptype [description]
	 * @return [type]          [description]
	 */
	public function dsptype($dsptype) {
		$this->dsptype = $dsptype;
	}

	/**
	 * DSP 系统中的广告素材ID，数组、字母组成
	 * @param  [string] $cid [description]
	 * @return [type]      [description]
	 */
	public function cid($cid) {
		$this->cid = $cid;
	}
	/**
	 * 宽x 高，例如：300x250
	 * @param  [string] $size [description]
	 * @return [type]       [description]
	 */
	public function size($size) {
		$this->size = $size;
	}
	/**
	 * 广告素材行业分类ID，多个以英文逗号分隔
	 * @param  [string] $category [description]
	 * @return [type]           [description]
	 */
	public function category($category) {
		$this->category = $category;
	}
	/**
	 * 广告代码，代码必须包含click 宏和win notice 宏，不能有<html>,<body>,<head>标签，广告的landing page 必须使用 target=”_blank“,在新窗口或 tab 页打开,js 代码不能改 变媒体当前页。
	 * @param  [string] $html [description]
	 * @return [type]       [description]
	 */
	public function html($html) {
		$this->html = $html;
	}
	/**
	 * 广告域名，点击广告跳转目标主域名。
	 * @param  [string] $domain [description]
	 * @return [type]         [description]
	 */
	public function domain($domain) {
		$this->domain = $domain;
	}
	/**
	 * 仅APP 使用，当dsptype 为3 时填写，移动广告类型:1、横幅、2、开屏 3、插屏 4、原生(native)
	 * @param  [member] $adtype [description]
	 * @return [type]         [description]
	 */
	public function adtype($adtype) {
		$this->adtype = $adtype;
	}
	/**
	 * 仅APP 使用，适用于native 广告，其他可以为空
	 * @param  [string] $description [description]
	 * @return [type]              [description]
	 */
	public function description($description) {
		$this->description = $description;
	}
	/**
	 * 仅APP 使用，适用于native 广告，其他可以为空
	 * @param  [string] $title [description]
	 * @return [type]        [description]
	 */
	public function title($title) {
		$this->title = $title;
	}
	/**
	 * 仅APP 使用，当广告点击的时候的反馈地址，地址中若存在urlencode 部分请改用base64 编码
	 * @param  [array] $clickreport [description]
	 * @return [type]              [description]
	 */
	public function clickreport($clickreport) {
		$this->clickreport = $clickreport;
	}
	/**
	 * 仅APP 使用，当广告展示的时候的反馈地址，地址中若存在urlencode 部分请改用base64 编码
	 * @param  [array] $impressionreport [description]
	 * @return [type]                   [description]
	 */
	public function impressionreport($impressionreport) {
		$this->impressionreport = $impressionreport;
	}
	/**
	 * 仅APP 使用，广告物料地址，图片地址
	 * @param  [string] $imgurl [description]
	 * @return [type]         [description]
	 */
	public function imgurl($imgurl) {
		$this->imgurl = $imgurl;
	}
	/**
	 * 仅APP 使用，广告最终落地页地址
	 * @param  [string] $ldp [description]
	 * @return [type]      [description]
	 */
	public function ldp($ldp) {
		$this->ldp = $ldp;
	}

	/**
	 * 设置查询报表的时间，
	 * @param  [type] $date [查询报表的时间,时间格式为yyyy-mm-dd]
	 * @return [type]       [description]
	 */
	public function date($date) {
		$this->date = $date;
	}

	/**
	 * 批量上传创意
	 * @return [type] [description]
	 */
	public function batchSync() {
		$this->http = $this->conf['apt_https']['creatives']['add'];
		$this->header = array('Content-Type: application/json');
		$this->request = array(
			'id' => $this->id,
			'signTime' => $this->signTime,
			'token' => $this->token,
			'dsptype' => $this->dsptype,
			'data' => array($this->data),
		);
	}

	/**
	 * 更新创意
	 * @return [type] [description]
	 */
	public function update() {
		$this->http = $this->conf['apt_https']['creatives']['update'];
		$this->header = array('Content-Type: application/json');
		$this->request = array(
			'id' => $this->id,
			'signTime' => $this->signTime,
			'token' => $this->token,
			'dsptype' => $this->dsptype,
			'data' => array($this->data),
		);
	}

	/**
	 * 查询创意审核状态
	 * @return [type] [description]
	 */
	public function status() {
		$this->http = $this->conf['apt_https']['creatives']['status'];
		$this->header = array('Content-Type: application/json');
		$this->request = array(
			'id' => $this->id,
			'signTime' => $this->signTime,
			'token' => $this->token,
			'dsptype' => $this->dsptype,
			'data' => array($this->data),
		);
	}

	public function report() {
		$this->http = $this->conf['apt_https']['creatives']['report'];
		$this->header = array('Content-Type: application/json');
		$this->request = array(
			'id' => $this->id,
			'signTime' => $this->signTime,
			'token' => $this->token,
			'date' => $this->date,
		);
	}

	/**
	 * 执行操作
	 * @return [type] [description]
	 */
	public function exec() {
		$this->curl->http = $this->http;
		$this->curl->header = $this->header;
		$this->curl->data = json_encode($this->request);
		$this->curl->post();

	}

	/**
	 * 格式化数据
	 * @return [type] [description]
	 */
	public function formatData() {
		if ($this->dsptype != 3) {
//是PC/wap
			$this->data = array(
				'cid' => $this->cid,
				'size' => $this->size,
				'category' => $this->category,
				'html' => $this->html,
				'domain' => $this->domain,
			);
		} else {
//app
			$this->data = array(
				'cid' => $this->cid,
				'adtype' => $this->adtype,
				'title' => $this->title,
				'desc' => $this->description,
				'ldp' => $this->ldp,
				'size' => $this->size,
				'imgurl' => $this->imgurl,
				'category' => $this->category,
				'impressionreport' => $this->impressionreport,
				'clickreport' => $this->clickreport,
				'html' => $this->html,
				'domain' => $this->domain,
			);
		}

	}

	/**
	 * 组织id
	 * @param  [string] $ids [多个id用,隔开]
	 * @return [type]      [description]
	 */
	public function build_ids($ids) {
		$ids = explode(',', $ids);
		$arr = [];
		foreach ($ids as $key => $value) {
			$arr['cid'] = $value;
			array_push($this->data, $arr);
		}
	}

}