<?php
namespace SDK\MiaoZhen;

/**
 * |-----------------------------------------------------------------------------
 * | MiaoZhen Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class MiaoZhen {
	private $curl;
	private $conf;
	private $http;
	private $header;
	private $data;
	private $request;
	private $response;
	private $creativeType;
	private $material;
	private $natived;
	private $wax_feed;
	private $wax_feed_activity;
	private $sohu;
	private $creativeId;
	private $category;
	private $url;
	private $width;
	private $height;
	private $duration;
	private $landingpage;
	private $deeplinkurl;
	private $advertiser;
	private $startdate;
	private $enddate;
	private $monitor;
	private $type;
	private $action;
	private $title;
	private $description;
	private $download_info;
	private $nativepic;
	private $nativevideo;
	private $app_type;
	private $packagename;
	private $appname;
	private $app_intro_url;
	private $app_size;
	private $app_ver;
	private $itunesId;
	private $app_id;
	private $obj_id;
	private $uid;
	private $mblog_text;
	private $pics;
	private $button_type;
	private $app_url;
	private $developer;
	private $icon;
	private $image;
	private $campaignId;
	private $adtext;
	private $showtext;
	private $deliveryType;
	private $reportType;
	private $date;

	public function __construct($curl, $conf) {
		$this->curl = $curl;
		$this->conf = $conf;
		$this->header = array('Content-type:application/json');
		$this->data = array(
			'dspid' => $this->conf['dspId'],
			'token' => $this->conf['token'],
		);
	}

	/**
	 * 创意类型
	 * @param  string $creativeType [创意类型,取值包括：1.普通物料banner或video 2.普通信息流 3.普通博文 4.微博品牌大Card 5.搜狐素材。]
	 * @return [type]               [description]
	 */
	public function creativeType($creativeType = '1') {
		$this->creativeType = $creativeType;
	}

	/**
	 * DSP平台的创意ID
	 * @param  string $creativeId [DSP平台的创意ID，和BidResponse.crid一致]
	 * @return [type]             [description]
	 */
	public function creativeId($creativeId = '') {
		$this->creativeId = $creativeId;
	}

	/**
	 * XTrader平台行业ID
	 * @param  string $category [XTrader平台行业ID，对外暂不使用]
	 * @return [type]           [description]
	 */
	public function category($category = '') {
		$this->category = $category;
	}

	/**
	 * 素材URL地址
	 * @param  string $url [素材URL地址]
	 * @return [type]      [description]
	 */
	public function url($url = '') {
		$this->url = $url;
	}

	/**
	 * 素材宽度
	 * @param  integer $width [素材宽度]
	 * @return [type]         [description]
	 */
	public function width($width = 0) {
		$this->width = $width;
	}

	/**
	 * 素材高度
	 * @param  integer $height [素材高度]
	 * @return [type]          [description]
	 */
	public function height($height = 0) {
		$this->height = $height;
	}

	/**
	 * 素材时长
	 * @param  inter $duration [素材时长，图片类素材制定素材时长为零]
	 * @return [type]           [description]
	 */
	public function duration($duration) {
		$this->duration = $duration;
	}

	/**
	 * 广告落地页
	 * @param  [string] $landingpage [广告落地页，广告点击后跳转的最终地址。landingpage本身可以包含302条转或第三方监测。物料绑定的landingpage在实时投放时是否会使用]
	 * @return [type]              [description]
	 */
	public function landingpage($landingpage = '') {
		$this->landingpage = $landingpage;
	}

	/**
	 * 应用直达URL
	 * @param  string $deeplinkurl [应用直达URL，当返回了deeplinkurl，优先唤醒本地app，如果无法唤醒，则调用ldp(打开或者下载)搜狐、腾讯、美团、微博这些媒体投放统一使用物料上传时指定的deeplinkurl，其他媒体投放使用RTB接口实时返回的deeplinkurl]
	 * @return [type]     [description]
	 */
	public function deeplinkurl($deeplinkurl = '') {
		$this->deeplinkurl = $deeplinkurl;
	}

	/**
	 * DSP平台广告主名称
	 * @param  [string] $advertiser [DSP平台广告主名称，需要和资质文件中的广告主名称一致]
	 * @return [type]             [description]
	 */
	public function advertiser($advertiser = '') {
		$this->advertiser = $advertiser;
	}

	/**
	 * 物料生效时间
	 * @param  string $startdate [物料生效时间，格式要求：YYYY-mm-dd，必须在有效期内的物料才能在XTrader平台投放]
	 * @return [type]            [description]
	 */
	public function startdate($startdate = '') {
		$this->startdate = $startdate;
	}

	/**
	 * 物料失效时间
	 * @param  string $enddate [物料失效时间，格式要求：YYYY-mm-dd，必须在有效期内的物料才能在XTrader平台投放]
	 * @return [type]          [description]
	 */
	public function enddate($enddate = '') {
		$this->enddate = $enddate;
	}

	/**
	 * 设置指定某一天获取小时报表的天
	 * @param  string $date [description]
	 * @return [type]       [description]
	 */
	public function date($date = '') {
		$this->date = $date;
	}

	/**
	 * 第三方曝光监测地址
	 * @param  [string||array] $monitor [第三方曝光监测地址。物料绑定的第三方曝光监测地址在实时投放时是否会使用，参见]
	 * @return [type]          [description]
	 */
	public function monitor($monitor) {
		$this->monitor = $monitor;
	}

	/**
	 * 物料类型
	 * @param  [type] $type [物料类型，
	 *                      如果creativeType：
	 *                      	1：取值："jpg","png","gif","swf","flv","mp4","x"。"jpg","png","gif","swf","flv","mp4"这些物料类型，XTrader平台会根据物料url后缀判断出物料类型。"type"="x"自带跳转地址的flash物料，对于"type"="x"的物料，XTrader平台会忽略RTB接口实时返回的ldp落地页，
	 *                       	2：取值：1-icon 2-logo 3-main(image)
	 *
	 * ]
	 * @return [type]       [description]
	 */
	public function type($type) {
		$this->type = $type;
	}

	/**
	 * 广告交互类型
	 * @param  string $action [广告交互类型，1-打开网页 2-下载]
	 * @return [type]         [description]
	 */
	public function action($action = '1') {
		$this->action = $action;
	}

	/**
	 * 信息流广告标题
	 * @param  string $title [信息流广告标题]
	 * @return [type]        [description]
	 */
	public function title($title = '') {
		$this->title = $title;
	}

	/**
	 * 信息流广告描述
	 * @param  string $description [信息流广告描述]
	 * @return [type]              [description]
	 */
	public function description($description = '') {
		$this->description = $description;
	}

	/**
	 * 应用类型
	 * @param  integer $app_type [应用类型： 0为 Android，1为 ios]
	 * @return [type]            [description]
	 */
	public function app_type($app_type = 0) {
		$this->app_type = $app_type;
	}

	/**
	 * 应用包名称
	 * @param  string $packagename [应用包名称]
	 * @return [type]              [description]
	 */
	public function packagename($packagename = '') {
		$this->packagename = $packagename;
	}

	/**
	 * 应用名称
	 * @param  string $appname [应用名称]
	 * @return [type]          [description]
	 */
	public function appname($appname = '') {
		$this->appname = $appname;
	}

	/**
	 * Android应用介绍页面
	 * @param  string $app_intro_url [Android应用介绍页面，当"app_type"=0时必填]
	 * @return [type]                [description]
	 */
	public function app_intro_url($app_intro_url = '') {
		$this->app_intro_url = $app_intro_url;
	}

	/**
	 * 应用大小
	 * @param  string $app_size [应用大小]
	 * @return [type]           [description]
	 */
	public function app_size($app_size = '') {
		$this->app_size = $app_size;
	}

	/**
	 * 应用版本
	 * @param  string $app_ver [应用版本]
	 * @return [type]          [description]
	 */
	public function app_ver($app_ver = '') {
		$this->app_ver = $app_ver;
	}

	/**
	 * iOS应用 App Store ID
	 * @param  string $itunesId [iOS应用 App Store ID,当"app_type"=1时必填]
	 * @return [type]           [description]
	 */
	public function itunesId($itunesId = '') {
		$this->itunesId = $itunesId;
	}

	/**
	 * Android应用在应用商店上架的appid
	 * @param  string $app_id [Android应用在应用商店上架的appid,当"app_type"=0时必填]
	 * @return [type]         [description]
	 */
	public function app_id($app_id = '') {
		$this->app_id = $app_id;
	}

	/**
	 * Android apk 包下载地址或ios iTunes链接
	 * @param  string $app_url [Android apk 包下载地址或ios iTunes链接]
	 * @return [type]          [description]
	 */
	public function app_url($app_url = '') {
		$this->app_url = $app_url;
	}

	/**
	 * 开发者
	 * @param  string $developer [开发者,"app_type"=0必填]
	 * @return [type]            [description]
	 */
	public function developer($developer = '') {
		$this->developer = $developer;
	}

	/**
	 * 应用图标地址
	 * @param  string $icon [应用图标地址,"app_type"=0必填]
	 * @return [type]       [description]
	 */
	public function icon($icon = '') {
		$this->icon = $icon;
	}

	/**
	 * 应用截图
	 * @param  string $image [应用截图,"app_type"=0必填]
	 * @return [type]        [description]
	 */
	public function image($image = '') {
		$this->image = $image;
	}

	/**
	 * 下载的应用信息对象
	 * @param  [type] $download_info [下载的应用信息对象,当"action"=2时必填]
	 * @return [type]                [description]
	 */
	public function download_info($download_info) {
		$this->download_info = $this->creativeType == 2 ? array(
			'app_type' => $this->app_type,
			'packagename' => $tis->packagename,
			'appname' => $this->appname,
			'app_intro_url' => $this->app_intro_url,
			'app_size' => $this->app_size,
			'app_ver' => $this->app_ver, 'itunesId' => $this->itunesId,
			'app_id' => $this->app_id,
		) : array(
			'app_type' => $this->app_type,
			'app_url' => $this->app_url,
			'packagename' => $tis->packagename,
			'appname' => $this->appname, 'developer' => $this->developer,
			'description' => $this->description,
			'icon' => $this->icon,
			'image' => $this->image,
		);
	}

	/**
	 * 图片素材对象
	 * @param  [array||object] $nativepic [图片素材对象，对象元素：{"type":"","width":"","height":"","url":""}。type取值：1-icon 2-logo 3-main(image)]
	 * @return [type]            [description]
	 */
	public function nativepic($nativepic) {
		$this->nativepic = array(
			'type' => $this->type,
			'width' => $this->width,
			'height' => $this->height,
			'url' => $this->url,
		);
	}

	/**
	 * 贴片视频素材对象
	 * @param  [type] $nativevideo [贴片视频素材对象，对象元素：{"width":"","height":"","duration":"",url":""}。]
	 * @return [type]              [description]
	 */
	public function nativevideo($nativevideo) {
		$this->nativevideo = array(
			'width' => $this->width,
			'height' => $this->height,
			'duration' => $this->duration,
			'url' => $this->url,
		);
	}

	/**
	 * 微博mid
	 * @param  string $obj_id [微博mid,当uid、mblog_text、pics为空时必填]
	 * @return [type]         [description]
	 */
	public function obj_id($obj_id = '') {
		$this->obj_id = $obj_id;
	}

	/**
	 * 使用当前素材发布微博所用的uid
	 * @param  string $uid [使用当前素材发布微博所用的uid,当obj_id为空时必填]
	 * @return [type]      [description]
	 */
	public function uid($uid = '') {
		$this->uid = $uid;
	}

	/**
	 * 微博正文， 若无链接， 不多于 140字， 若有链接正文 处直接 添加链接（占 10 个 字） ，其余 不多于 130 个
	 * @param  string $mblog_text [微博正文， 若无链接， 不多于 140字， 若有链接正文 处直接 添加链接（占 10 个 字） ，其余 不多于 130 个,当obj_id为空时必填]
	 * @return [type]             [description]
	 */
	public function mblog_text($mblog_text = '') {
		$this->mblog_text = $mblog_text;
	}

	/**
	 * 微博图片url，最多9张，尺寸没有限制。图片格式为png、jpg或gif，大小不超过5M。
	 * @param  string||array  $pics [微博图片url，最多9张，尺寸没有限制。图片格式为png、jpg或gif，大小不超过5M。当obj_id为空时必填]
	 * @return [type]       [description]
	 */
	public function pics($pics = '') {
		$this->pics = $pics;
	}

	/**
	 * 微博活动card按钮类型
	 * @param  string $button_type [微博活动 card 按钮类型,支 持:none(无)、join(参与)、 buy(购买)、download(下 载)]
	 * @return [type]              [description]
	 */
	public function button_type($button_type = 'none') {
		$this->button_type = $button_type;
	}

	/**
	 * PDB投放搜狐平台分配的campaignId
	 * @param  string $campaignId [PDB投放搜狐平台分配的campaignId,当"deliveryType"=2或4时必填]
	 * @return [type]             [description]
	 */
	public function campaignId($campaignId = '') {
		$this->campaignId = $campaignId;
	}

	/**
	 * 广告语
	 * @param  string $adtext [广告语]
	 * @return [type]         [description]
	 */
	public function adtext($adtext = '') {
		$this->adtext = $adtext;
	}

	/**
	 * 分享语
	 * @param  [type] $showtext [分享语,投放搜狐开屏必填]
	 * @return [type]           [description]
	 */
	public function showtext($showtext) {
		$this->showtext = $showtext;
	}

	/**
	 * 搜狐平台资源投放方式
	 * @param  string $deliveryType [搜狐平台资源投放方式：1.RTB 2.PDB 3.PMP 4.Preferred Deal，目前只有1、2有效，3、4dsp可以忽略]
	 * @return [type]               [description]
	 */
	public function deliveryType($deliveryType = '') {
		$this->deliveryType = $deliveryType;
	}

	/**
	 * 请求的报表类型
	 * @param  string $reportType [请求的报表类型,包括：general（概览）和detail（详细数据），如果为空，则默认为general]
	 * @return [type]             [description]
	 */
	public function reportType($reportType = 'general') {
		$this->reportType = $reportType;
	}

	public function formatData() {
		switch (intval($this->creativeType)) {
		case 2: // 普通信息流
			$this->data['creativeType'] = string($this->creativeType);
			$this->data['natived'] = array(
				'creativeId' => $this->creativeId,
				'category' => array(),
				'nativepic' => $this->nativepic,
				'nativevideo' => $this->nativevideo,
				'landingpage' => $this->landingpage,
				'deeplinkurl' => $this->deeplinkurl,
				'advertiser' => $this->advertiser,
				'startdate' => $this->startdate,
				'enddate' => $this->enddate,
				'monitor' => $this->monitor,
				'title' => $this->title,
				'description' => $this->description,
				'action' => $this->action,
				'download_info' => $this->download_info,
			);
			break;
		case 3: // 普通博文
			$this->data['creativeType'] = string($this->creativeType);
			$this->data['wax_feed'] = array(
				'creativeId' => $this->creativeId,
				'category' => array(),
				'advertiser' => $this->advertiser,
				'startdate' => $this->startdate,
				'enddate' => $this->enddate,
				'monitor' => $this->monitor,
				'obj_id' => $this->obj_id,
				'uid' => $this->uid,
				'mblog_text' => $this->mblog_text,
				'pics' => $this->pics,
			);
			break;
		case 4: // 微博品牌大Card
			$this->data['creativeType'] = string($this->creativeType);
			$this->data['wax_feed_activity'] = array(
				'creativeId' => $this->creativeId,
				'pics' => $this->pics,
				'category' => array(),
				'landingpage' => $this->landingpage,
				'deeplinkurl' => $this->deeplinkurl,
				'advertiser' => $this->advertiser,
				'startdate' => $this->startdate,
				'enddate' => $this->enddate,
				'monitor' => $this->monitor,
				'uid' => $this->uid,
				'mblog_text' => $this->mblog_text,
				'title' => $this->title,
				'description' => $this->description,
				'button_type' => $this->button_type,
				'download_info' => $this->download_info,
			);
			break;
		case 5: // 搜狐素材
			$this->data['creativeType'] = string($this->creativeType);
			$this->data['sohu'] = array(
				'creativeId' => $this->creativeId,
				'category' => array(),
				'url' => $this->url,
				'width' => $this->width,
				'height' => $this->height,
				'duration' => $this->duration,
				'landingpage' => $this->landingpage,
				'deeplinkurl' => $this->deeplinkurl,
				'advertiser' => $this->advertiser,
				'startdate' => $this->startdate,
				'enddate' => $this->enddate,
				'monitor' => $this->monitor,
				'action' => $this->action,
				'campaignId' => $this->campaignId,
				'adtext' => $this->adtext,
				'showtext' => $this->showtext,
				'deliveryType' => $this->deliveryType,
			);
			break;
		default: // 普通物料banner或video
			$this->data['creativeType'] = string($this->creativeType);
			$this->data['material'] = array(
				'creativeId' => $this->creativeId,
				'category' => array(),
				'url' => $this->url,
				'width' => $this->width,
				'height' => $this->height,
				'duration' => $this->duration,
				'landingpage' => $this->landingpage,
				'deeplinkurl' => $this->deeplinkurl,
				'advertiser' => $this->advertiser,
				'startdate' => $this->startdate,
				'enddate' => $this->enddate,
				'monitor' => $this->monitor,
				'type' => $this->type,
				'action' => $this->action,
			);
			break;
		}
	}

	/**
	 * 添加创意信息
	 */
	public function add() {
		$this->curl->http = $this->conf['add'];
		$this->curl->header = $this->header;
		$this->curl->data = json_encode($this->data);
	}

	/**
	 * 获取创意审核状态
	 * @return [type] [description]
	 */
	public function status() {
		$this->curl->http = $this->conf['status'];
		$this->curl->header = $this->header;
		$this->curl->data = json_encode($this->data['creativeIds'] = array($this->creativeId));
	}

	/**
	 * 获取指定一段日期报表
	 * @return [type] [description]
	 */
	public function reportByDay() {
		$this->data['type'] = $this->reportType;
		$this->data['startdate'] = $this->startdate;
		$this->data['enddate'] = $this->enddate;
		$this->curl->http = $this->conf['report'];
		$this->curl->header = $this->header;
		$this->curl->data = json_encode($this->data);
	}

	/**
	 * 获取指定某一天内小时的报表，
	 * @return [type] [description]
	 */
	public function reportByHour() {
		$this->curl->http = $this->conf['report'] . '/hour/' . $this->reportType;
		$this->curl->header = $this->header;
		if ($this->reportType = 'general') {
			$this->data['startdate'] = $this->startdate;
			$this->data['enddate'] = $this->enddate;
		} else {
			//按小时获取详细报表,如果没有设置要获取哪一天的报表则获取当前天的前一天的报表，只能查1天
			$this->data['date'] = isset($this->date) && !empty($this->date) ? $this->date : date('Y-m-d', strtotime("-1 day"));

		}
	}

	public function exec() {
		$this->curl->post();
	}
}