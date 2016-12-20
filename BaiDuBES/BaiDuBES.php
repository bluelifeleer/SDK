<?php
/**
 * |-----------------------------------------------------------------------------
 * | BaiDuBES Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class BaiDuBES {
	private $header;
	private $http;
	private $request;
	private $curl;
	private $conf;
	private $advertiserId;
	private $advertiserLiteName;
	private $advertiserName;
	private $siteName;
	private $siteUrl;
	private $telephone;
	private $address;
	private $isWhiteUser;
	private $startDate;
	private $endDate;
	private $id;
	private $request;
	private $data;
	public function __construct($curl, $conf) {
		$this->curl = $curl;
		$this->conf = $conf;
	}

	/**
	 * 广告主id;此id为dsp系统的广告主id，需唯一
	 * @param  [member] $advertiserId [description]
	 * @return [type]               [description]
	 */
	public function advertiserId($advertiserId){
		$this->advertiserId = $advertiserId;
	}
	/**
	 * 广告主名称;不超过200个字节。需唯一
	 * @param  [string] $advertiserLiteName [description]
	 * @return [type]                     [description]
	 */
	public function advertiserLiteName($advertiserLiteName){
		$this->advertiserLiteName = $advertiserLiteName;
	}
	/**
	 * 广告主主体资质名称;最少3个字节，不超过200个字节可重复,请确保此名称与客户营业执照上的名称一致，否则该客户创意无法正常投放。创建时非必填，但此字段只有填写后，百度才会进行广告主状态检查。
	 * @param  [string] $advertiserName [description]
	 * @return [type]                 [description]
	 */
	public function advertiserName($advertiserName){
		$this->advertiserName = $advertiserName;
	}

	/**
	 * 网站名;最长100个字符。创建时非必填，但此字段只有填写后，百度才会进行广告主状态检查。
	 * @param  [string] $siteName [description]
	 * @return [type]           [description]
	 */
	public function siteName($siteName){
		$this->siteName = $siteName;
	}

	/**
	 * 网站URL;最长512个字节，必须以http:// 开头。创建时非必填，但此字段只有填写后，百度才会进行广告主状态检查。
	 * @param  [string] $siteUrl [description]
	 * @return [type]          [description]
	 */
	public function siteUrl($siteUrl){
		$this->siteUrl = $siteUrl;
	}

	/**
	 * 联系电话;最长100个字符
	 * @param  [string] $telephone [description]
	 * @return [type]            [description]
	 */
	public function telephone($telephone){
		$this->telephone = $telephone;
	}

	/**
	 * 通讯地址;最长100个字符
	 * @param  [string] $address [description]
	 * @return [type]          [description]
	 */
	public function address($address){
		$this->address = $address;
	}

	/**
	 * 广告主是否白名单;0：非白名单；1：白名单此字段在请求时不需要填写且不生效。只在返回时标识广告主是否白名单。
	 * @param  [type]  $isWhiteUser [description]
	 * @return boolean              [description]
	 */
	public function isWhiteUser($isWhiteUser){
		$this->isWhiteUser = $isWhiteUser;
	}
	
	/**
	 * 设置查询开始时间
	 * @param  [type] $timer [统计开始时间格式参考：2013-08-01]
	 * @return [type]        [description]
	 */
	public function startDate($timer){
		$this->startDate = $timer;
	}

	/**
	 * 设置查询结束时间
	 * @param  [type] $timer [统计结束时间格式参考：2013-08-01]
	 * @return [type]        [description]
	 */
	public function endDate($timer){
		$this->endDate = $timer;
	}

	/**
	 * 设置查询广告主的id
	 * @param  [type] $id [string|array]
	 * @return [type]     [description]
	 */
	public function id($id){
		$this->id = $id;
	}

	/**
	 * 添加广告主
	 * @return [type] [description]
	 */
	public function advertiserAdd(){
		$this->http = $this->conf['api_https']['advertisers']['add'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'request' => array($this->data),
		);
	}

	/**
	 * 更新广告主信息
	 * @return [type] [description]
	 */
	public function advertiserUpdate(){
		$this->http = $this->conf['api_https']['advertisers']['update'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'request' => array($this->data),
		);
	}

	/**
	 * 获取指定时间段内上传的广告主信息
	 * @return [type] [description]
	 */
	public function advertiserGetAll(){
		$this->http = $this->conf['api_https']['advertisers']['getAll'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
		);
	}

	/**
	 * 查询指定ID的广告主信息
	 * @return [type] [description]
	 */
	public function advertiserGet(){
		$this->http = $this->conf['api_https']['advertisers']['get'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'advertiserIds' => array($this->id),
		);
	}

	/**
	 * 查询指定广告主的审核状态
	 * @return [type] [description]
	 */
	public function advertiserQueryQualification(){
		$this->http = $this->conf['api_https']['advertisers']['queryQualification'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'advertiserIds' => array($this->id),
		);
	}

	/**
	 * 添加创意
	 * @return [type] [description]
	 */
	public function creativeAdd(){
		
	}

	/**
	 * 执行操作
	 * @return [type] [description]
	 */
	public function exec(){
		$this->curl->http = $this->http;
		$this->curl->header = $this->header;
		$this->curl->data = json_encode($this->request);
		$this->curl->post();
	}

	/**
	 * 格式化数据
	 * @return [type] [description]
	 */
	public function foramtData(){
		$this->data = array(
			'advertiserId' => ,
			'advertiserLiteName' => ,
			'dvertiserName' => ,
			'siteName' => ,
			'siteUrl' => ,
			'telephone' => ,
			'address' => ,
		);
	}
}