<?php
namespace SDK\BaiDuBES;

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
	private $response;
	private $data;
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
	private $creativeId;
	private $adviewType;
	private $type;
	private $state;
	private $creativeUrl;
	private $binaryData;
	private $targetUrl;
	private $landingPage;
	private $monitorUrls;
	private $height;
	private $width;
	private $creativeTradeId;
	private $frameAgreementNo;
	private $interactiveStyle;
	private $telNo;
	private $downloadUrl;
	private $appName;
	private $appDesc;
	private $appPackageSize;
	private $dataRate;
	private $duration;
	private $domain;
	private $playTimeMonitorUrl;

	public function __construct($curl, $conf) {
		$this->curl = $curl;
		$this->conf = $conf;
	}

	/**
	 * 广告主id;此id为dsp系统的广告主id，需唯一
	 * @param  [member] $advertiserId [description]
	 * @return [type]               [description]
	 */
	public function advertiserId($advertiserId) {
		$this->advertiserId = $advertiserId;
	}
	/**
	 * 广告主名称;不超过200个字节。需唯一
	 * @param  [string] $advertiserLiteName [description]
	 * @return [type]                     [description]
	 */
	public function advertiserLiteName($advertiserLiteName) {
		$this->advertiserLiteName = $advertiserLiteName;
	}
	/**
	 * 广告主主体资质名称;最少3个字节，不超过200个字节可重复,请确保此名称与客户营业执照上的名称一致，否则该客户创意无法正常投放。创建时非必填，但此字段只有填写后，百度才会进行广告主状态检查。
	 * @param  [string] $advertiserName [description]
	 * @return [type]                 [description]
	 */
	public function advertiserName($advertiserName) {
		$this->advertiserName = $advertiserName;
	}

	/**
	 * 网站名;最长100个字符。创建时非必填，但此字段只有填写后，百度才会进行广告主状态检查。
	 * @param  [string] $siteName [description]
	 * @return [type]           [description]
	 */
	public function siteName($siteName) {
		$this->siteName = $siteName;
	}

	/**
	 * 网站URL;最长512个字节，必须以http:// 开头。创建时非必填，但此字段只有填写后，百度才会进行广告主状态检查。
	 * @param  [string] $siteUrl [description]
	 * @return [type]          [description]
	 */
	public function siteUrl($siteUrl) {
		$this->siteUrl = $siteUrl;
	}

	/**
	 * 联系电话;最长100个字符
	 * @param  [string] $telephone [description]
	 * @return [type]            [description]
	 */
	public function telephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * 通讯地址;最长100个字符
	 * @param  [string] $address [description]
	 * @return [type]          [description]
	 */
	public function address($address) {
		$this->address = $address;
	}

	/**
	 * 广告主是否白名单;0：非白名单；1：白名单此字段在请求时不需要填写且不生效。只在返回时标识广告主是否白名单。
	 * @param  [type]  $isWhiteUser [description]
	 * @return boolean              [description]
	 */
	public function isWhiteUser($isWhiteUser) {
		$this->isWhiteUser = $isWhiteUser;
	}

	/**
	 * 设置查询开始时间
	 * @param  [type] $timer [统计开始时间格式参考：2013-08-01]
	 * @return [type]        [description]
	 */
	public function startDate($timer) {
		$this->startDate = $timer;
	}

	/**
	 * 设置查询结束时间
	 * @param  [type] $timer [统计结束时间格式参考：2013-08-01]
	 * @return [type]        [description]
	 */
	public function endDate($timer) {
		$this->endDate = $timer;
	}

	/**
	 * 设置上传创意的id
	 * @param  [string] $id [创意id  此id 为dsp系统的创意id，需唯一]
	 * @return [type]     [description]
	 */
	public function creativeId($creativeId) {
		$this->creativeId = $creativeId;
	}

	/**
	 * [设置流量类型]
	 * @param  [inter] $adviewType [流量类型 否 1：Web 流量2：Mobile 流量3：Video 流量,默认为1；如果投Mobile 流量，该参数必须为2；如果投放Video流量，该参数必须为3；]
	 * @return [type]             [description]
	 */
	public function adviewType($adviewType = 1) {
		$this->adviewType = $adviewType;
	}

	/**
	 * [设置创意类型]
	 * @param  [integer] $type [类型 当adviewType 为2 时，该字段只能为1；当adviewType 为3时，该字段只能为3；1：图片2：flash3：视频]
	 * @return [type]        [description]
	 */
	public function type($type = 1) {
		$this->type = $type;
	}

	/**
	 * [设置创意审核状态]
	 * @param  [inter] $state [状态 N/A 该字段仅在调用get/getAll/queryAuditState 接口时由系统提供，定义如下：0：通过1：待检查2：检查拒绝]
	 * @return [type]        [description]
	 */
	public function state($state) {
		$this->state = $state;
	}

	/**
	 * 创意URL
	 * @param  [string] $creativeUrl [长度限制：2048 个字节大小限制：图片、flash 不大于150kURL 后缀限制：jpg|gif|swf，png格式类型的创意无法通过该种方式上传，请使用binaryData 字段进行该种类型图片的上传。注：API 会在后台访问创意的URL地址，抓取图片或者flash 创意。请确保URL 可连通并且可以通过HTTP 协议在万维网上访问到。]
	 * @return [type]              [description]
	 */
	public function creativeUrl($creativeUrl) {
		$this->creativeUrl = $creativeUrl;
	}

	/**
	 * 创意二进制数据
	 * @param  [byte[]] $binaryData [大小限制：图片、flash 不大于150k当不存在creativeUrl 时，则选择使用binaryData 来上传创意，二者必须存在其一。binaryData 的处理优先级高于creativeUrl。]
	 * @return [type]             [description]
	 */
	public function binaryData($binaryData) {
		$this->binaryData = $binaryData;
	}

	/**
	 * 点击链接
	 * @param  [string] $targetUrl [当adviewType 为2 时，且创意尺寸为640*960、480*800 时，该字段为非必填，其余情况下为必填；]
	 * @return [type]            [description]
	 */
	public function targetUrl($targetUrl) {
		$this->targetUrl = $targetUrl;
	}

	/**
	 * 到达页面连接
	 * @param  [string] $landingPage [当adviewType 为2 时，且创意尺寸为640*960、480*800 时，该字段为非必填，其余情况下为必填；长度限制：2048 个字节]
	 * @return [type]              [description]
	 */
	public function landingPage($landingPage) {
		$this->landingPage = $landingPage;
	}

	/**
	 * 广告展现监测链接数组
	 * @param  [string[]] $monitorUrls [最多包含3 个链接每个链接长度限制：1024 个字节]
	 * @return [type]              [description]
	 */
	public function monitorUrls($monitorUrls) {
		$this->monitorUrls = $monitorUrls;
	}

	/**
	 * [创意高]
	 * @param  [inter] $height [当adviewType 为1 时：见web流量创意尺寸补充说明；当adviewType 为2 时： 见mobile 流量创意尺寸补充说明；当adviewType 为3 时：见video流量创意尺寸补充说明；]
	 * @return [type]         [description]
	 */
	public function height($height) {
		$this->height = $height;
	}

	/**
	 * [创意宽]
	 * @param  [inter] $width [当adviewType 为1 时：见web流量创意尺寸补充说明；当adviewType 为2 时： 见mobile 流量创意尺寸补充说明；当adviewType 为3 时：见video流量创意尺寸补充说明；]
	 * @return [type]        [description]
	 */
	public function width($width) {
		$this->width = $width;
	}

	/**
	 * 创意所属广告行业
	 * @param  [inter] $creativeTradeId [注：必须指定到第2 级行业。广告行业体系见数据字典]
	 * @return [type]                  [description]
	 */
	public function creativeTradeId($creativeTradeId) {
		$this->creativeTradeId = $creativeTradeId;
	}

	/**
	 * [框架id]
	 * @param  [string] $frameAgreementNo [此处的框架id 指广告主与百度签署的框架协议id。如果广告主给出框架id 并且要求将在百度的投放计入框架，那么在上传创意的时候需要填写此字段。]
	 * @return [type]                   [description]
	 */
	public function frameAgreementNo($frameAgreementNo) {
		$this->frameAgreementNo = $frameAgreementNo;
	}

	/**
	 * [互动样式]
	 * @param  [inter] $interactiveStyle [当adviewType 为2 时，该字段为必填；0：无1：电话直拨2：点击下载]
	 * @return [type]                   [description]
	 */
	public function interactiveStyle($interactiveStyle = 0) {
		$this->interactiveStyle = $interactiveStyle;
	}

	/**
	 * 电话号码
	 * @param  [string] $telNo [当adviewType 为2 且interactiveStyle 为1 时，该字段为必填；电话号码须全为数字，如400 号、800 号、手机号、座机号等，例如]
	 * @return [type]        [description]
	 */
	public function telNo($telNo) {
		$this->telNo = $telNo;
	}

	/**
	 * 下载包地址
	 * @param  [string] $downloadUrl [当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；长度限制：2048 个字节]
	 * @return [type]              [description]
	 */
	public function downloadUrl($downloadUrl) {
		$this->downloadUrl = $downloadUrl;
	}

	/**
	 * 应用名称
	 * @param  [string] $appName [当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；长度限制：小于28 个字符]
	 * @return [type]          [description]
	 */
	public function appName($appName) {
		$this->appName = $appName;
	}

	/**
	 * 应用介绍
	 * @param  [string] $appDesc [当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；长度限制：小于60 个字符]
	 * @return [type]          [description]
	 */
	public function appDesc($appDesc) {
		$this->appDesc = $appDesc;
	}

	/**
	 * 应用大小
	 * @param  [float] $appPackageSize [当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；单位：MB]
	 * @return [type]                 [description]
	 */
	public function appPackageSize($appPackageSize) {
		$this->appPackageSize = $appPackageSize;
	}

	/**
	 * 码流
	 * @param  [inter] $dataRate [当adviewType 为3 时，该字段必填；视频广告的码流，单位是Kbps]
	 * @return [type]           [description]
	 */
	public function dataRate($dataRate) {
		$this->dataRate = $dataRate;
	}

	/**
	 * 创意时长
	 * @param  [inter] $duration [当adviewType 为3 时，该字段必填；广告的播放时长，单位是s]
	 * @return [type]           [description]
	 */
	public function duration($duration) {
		$this->duration = $duration;
	}

	/**
	 * 播放时间监测
	 * @param  [type] $playTimeMonitorUrl [即使是adviewType 为3，该字段也非必填；视频广告的播放时间监测。在视频广告播放的最后一秒请求，BES会在监测的后面添加播放完成的时间，单位是s。如http://dsp.com/……&pt=10长度限制：1024 个字节]
	 * @return [type]                     [description]
	 */
	public function playTimeMonitorUrl($playTimeMonitorUrl) {
		$this->playTimeMonitorUrl = $playTimeMonitorUrl;
	}

	/**
	 * 设置要查询的网站域名
	 * @param  [type] $domain [只填写主域名]
	 * @return [type]         [description]
	 */
	public function domain($domain) {
		$this->domain = $domain;
	}

	/**
	 * 添加广告主
	 * @return [type] [description]
	 */
	public function advertiserAdd() {
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
	public function advertiserUpdate() {
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
	public function advertiserGetAll() {
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
	public function advertiserGet() {
		$this->http = $this->conf['api_https']['advertisers']['get'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'advertiserIds' => array($this->advertiserId),
		);
	}

	/**
	 * 查询指定广告主的审核状态
	 * @return [type] [description]
	 */
	public function advertiserQueryQualification() {
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
	public function creativeAdd() {
		$this->http = $this->conf['api_https']['creatives']['add'];
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
	 * 修改创意
	 * @return [type] [description]
	 */
	public function creativeUpdate() {
		$this->http = $this->conf['api_https']['creatives']['update'];
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
	 * 获取指定时段上传的创意
	 * @return [type] [description]
	 */
	public function creativeGetAll() {
		$this->http = $this->conf['api_https']['creatives']['getAll'];
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
	 * 获取指定id的创意信息
	 * @return [type] [description]
	 */
	public function creativeGet() {
		$this->http = $this->conf['api_https']['creatives']['get'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'creativeIds' => array($this->creativeId),
		);
	}

	/**
	 * 查询创意审核 状态
	 * @return [type] [description]
	 */
	public function creativeQueryAuditState() {
		$this->http = $this->conf['api_https']['creatives']['queryAuditState'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'creativeIds' => array($this->creativeId),
		);
	}

	/**
	 * 查询百度修正过的创意及行业
	 * @return [type] [description]
	 */
	public function creativeGetTradeModified() {
		$this->http = $this->conf['api_https']['creatives']['getTradeModified'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'startDate' => $this->startDate,
			'endDate' => $this->endDate,
			'adviewType' => $this->adviewType,
		);
	}

	/**
	 * 查询指定时间内被拒绝的创意
	 * @return [type] [description]
	 */
	public function creativeDynamicGetAll() {
		$this->http = $this->conf['api_https']['creatives']['dynamicGetAll'];
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
	 * 创意预览URL 获取（仅web 流量使用）
	 * @return [type] [description]
	 */
	public function creativePreviewWebsite() {
		$this->http = $this->conf['api_https']['creatives']['dynamicGetAll'];
		$this->header = array('Content-Type:application/json');
		$this->request = array(
			'authHeader' => array(
				'dspId' => $this->conf['dspId'],
				'token' => $this->conf['token'],
			),
			'domain' => $this->domain,
			'creativeIds' => $this->creativeIds,
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
		$this->response = $this->curl->post();
	}

	/**
	 * 格式化数据
	 * @return [type] [description]
	 */
	public function foramtData($type = 'advertisers') {
		$this->data = $type == 'advertisers' ? array( //上传广告主
			'advertiserId' => $this->advertiserId,
			'advertiserLiteName' => $this->advertiserLiteName,
			'dvertiserName' => $this->dvertiserName,
			'siteName' => $this->siteName,
			'siteUrl' => $this->siteUrl,
			'telephone' => $this->telephone,
			'address' => $this->address,
		) : array( //上传创意
			'creativeId' => $this->creativeId, //创意id，[true]
			'adviewType' => $this->adviewType, //流量类型,1：Web 流量2：Mobile 流量3：Video 流量,[false]
			'type' => $this->type, //创意类型,当adviewType 为2 时，该字段只能为1；当adviewType 为3时，该字段只能为3；1：图片2：flash3：视频,[true]
			'creativeUrl' => $this->creativeUrl, //创意URL,[false]
			'binaryData' => $this->binaryData, //创意二进制数据,大小限制：图片、flash 不大于150k当不存在creativeUrl 时，则选择使用binaryData [false]来上传创意，二者必须存在其一。binaryData 的处理优先级高于creativeUrl。[false]
			'targetUrl' => $this->targetUrl, // 点击链接当adviewType 为2 时，且创意尺寸为640*960、480*800 时，该字段为非必填，其余情况下为必填；,[false]
			'landingPage' => $this->landingPage, //到达页面,当adviewType 为2 时，且创意尺寸为640*960、480*800 时，该字段为非必填，其余情况下为必填；长度限制：2048 个字节,[false]
			'monitorUrls' => array($this->monitorUrls), // 广告展现监测链,最多包含3 个链接每个链接长度限制：1024 个字节接数组,[true]
			'height' => $this->height, // 创意高,当adviewType 为1 时：见web流量创意尺寸补充说明；当adviewType 为2 时： 见mobile 流量创意尺寸补充说明；当adviewType 为3 时：见video流量创意尺寸补充说明；,[true]
			'width' => $this->width, // 创意宽,当adviewType 为1 时：见web流量创意尺寸补充说明；当adviewType 为2 时： 见mobile 流量创意尺寸补充说明；当adviewType 为3 时：见video流量创意尺寸补充说明；,[true]
			'creativeTradeId' => $this->creativeTradeId, //	创意所属广告行业,注：必须指定到第2 级行业。广告行业体系见数据字典,[true]
			'advertiserId' => $this->advertiserId, // 广告主id,[true]
			'frameAgreementNo' => $this->frameAgreementNo, // 框架id,此处的框架id 指广告主与百度签署的框架协议id。如果广告主给出框架id 并且要求将在百度的投放计入框架，那么在上传创意的时候需要填写此字段。,[false]
			'interactiveStyle' => $this->interactiveStyle, // 互动样式,当adviewType 为2 时，该字段为必填；0：无1：电话直拨2：点击下载,[false]
			'telNo' => $this->telNo, //	电话号码,当adviewType 为2 且interactiveStyle 为1 时，该字段为必填；电话号码须全为数字，如400 号、800 号、手机号、座机号等，例如,[false]
			'downloadUrl' => $this->downloadUrl, //	下载包地址,当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；长度限制：2048 个字节,[false]
			'appName' => $this->appName, //	应用名称,当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；长度限制：小于28 个字符,[false]
			'appDesc' => $this->appDesc, //	应用介绍,当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；长度限制：小于60 个字符,[false]
			'appPackageSize' => $this->appPackageSize, //	应用大小,当adviewType 为2 且interactiveStyle 为2 时，该字段为必填；单位：MB,[false]
			'dataRate' => $this->dataRate, // 码流，当adviewType 为3 时，该字段必填；视频广告的码流，单位是Kbps,[false]
			'duration' => $this->duration, // 创意时长,当adviewType 为3 时，该字段必填；广告的播放时长，单位是s,[false]
			'playTimeMonitorUrl' => $this->playTimeMonitorUrl, // 播放时间监测,即使是adviewType 为3，该字段也非必填；视频广告的播放时间监测。在视频广告播放的最后一秒请求，BES会在监测的后面添加播放完成的时间，单位是s。如http://dsp.com/……&pt=10长度限制：1024 个字节,[false]
		);
	}
}