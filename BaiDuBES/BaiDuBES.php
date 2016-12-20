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
	private $request;
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

	public function advertiserAdd(){
		$this->request = array(
			'authHeader' => array(
				'dspId' => ,
				'token' => ,
			),
			'request' => array(
				'' => ,
				'' => ,
				'' => ,
				'' => ,
				'' => ,
			),
		);
	}
}