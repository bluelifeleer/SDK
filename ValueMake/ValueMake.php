<?php
/**
 * |-----------------------------------------------------------------------------
 * | ValueMake Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class ValueMake {
	private $curl;
	private $conf;
	private $id;
	private $width;
	private $height;
	private $format;
	private $category;
	private $html_snippet;
	private $adomain_list;
	private $pic_urls;
	private $landingpage;
	private $visible_urls;
	private $cpe_info;
	private $file_url;
	private $duration;
	private $video_width;
	private $video_height;
	private $video_format;
	private $advertiser;
	private $creative_type;
	private $title;
	private $text;
	private $data;
	private $response;
	private $request;
	private $http;
	private $header;
	private $vmtype;
	public function __construct($curl, $conf) {
		$this->curl = $curl;
		$this->conf = $conf;
		$this->header = array('Authorization: Basic ' . base64_encode($this->conf['user_name'] . ':' . $this->conf['passwd']));
	}

	/**
	 * 设置创意ID
	 * @param  [string] $id [DSP 自己系统中的创意id。ID 号只能由数字、字母和中划线组成。]
	 * @return [type]     [description]
	 */
	public function id($id) {
		$this->id = $id;
	}

	/**
	 * 设置创意宽度
	 * @param  [number] $width [创意素材宽度。]
	 * @return [type]        [description]
	 */
	public function width($width) {
		$this->width = $width;
	}

	/**
	 * 设置创意高度
	 * @param  [number] $height [创意素材高度。]
	 * @return [type]         [description]
	 */
	public function height($height) {
		$this->height = $height;
	}

	/**
	 * 设置创意类型
	 * @param  [number] $format [创意展示格式：1-STATIC_PIC，2-DYNAMIC_PIC，3-SWF，4-TXT]
	 * @return [type]         [description]
	 */
	public function format($format = 1) {
		$this->format = $format;
	}

	/**
	 * [创意行业分类ID]
	 * @param  [number] $category [创意行业分类id。]
	 * @return [type]           [description]
	 */
	public function category($category) {
		$this->category = $category;
	}

	/**
	 * 创意代码
	 * @param  [string] $html_snippet [创意代码。]
	 * @return [type]               [description]
	 */
	public function html_snippet($html_snippet) {
		$this->html_snippet = $html_snippet;
	}

	/**
	 * 点击跳转目标地址主域名。
	 * @param  [string] $adomain_list [点击跳转目标地址主域名。]
	 * @return [type]               [description]
	 */
	public function adomain_list($adomain_list) {
		$this->adomain_list = $adomain_list;
	}

	/**
	 * 创意图片素材链接。
	 * @param  [string] $pic_urls [创意图片素材链接。]
	 * @return [type]           [description]
	 */
	public function pic_urls($pic_urls) {
		$this->pic_urls = $pic_urls;
	}

	/**
	 * 点击跳转地址URL
	 * @param  [string] $landingpage [点击跳转地址URL，需包含双方点击检测宏{!vam_click_url}（或{!vam_click_url_esc}）和{!dsp_click_url}。]
	 * @return [type]              [description]
	 */
	public function landingpage($landingpage) {
		$this->landingpage = $landingpage;
	}

	/**
	 * 可视化曝光监测URL
	 * @param  [string|array] $visible_urls [可视化曝光监测URL。]
	 * @return [type]               [description]
	 */
	public function visible_urls($visible_urls) {
		$this->visible_urls = $visible_urls;
	}

	/**
	 * cpe 创意视频相关信息，支持同时上传多个格式。
	 * @return [type] [description]
	 */
	public function cpe_info() {
		$this->cpe_info = array(array(
			'file_url' => $this->file_url,
			'duration' => $this->duration,
			'width' => $this->video_width,
			'height' => $this->video_height,
			'format' => $this->video_format,
		));
	}

	/**
	 * 设置视频素材URL。
	 * @param  [string] $file_url [视频素材URL。]
	 * @return [type]           [description]
	 */
	public function file_url($file_url) {
		$this->file_url = $file_url;
	}

	/**
	 * 设置视频创意时长。
	 * @param  [number] $duration [视频创意时长。与视频素材列表顺序保持一致。]
	 * @return [type]           [description]
	 */
	public function duration($duration) {
		$this->duration = $duration;
	}

	/**
	 * 设置素材分辨率宽。与视频素材列表顺序保持一致。
	 * @param  [number] $video_width [素材分辨率宽。与视频素材列表顺序保持一致。]
	 * @return [type]              [description]
	 */
	public function video_width($video_width) {
		$this->video_width = $video_width;
	}

	/**
	 * 设置素材分辨率高。与视频素材列表顺序保持一致。
	 * @param  [number] $video_width [素材分辨率高。与视频素材列表顺序保持一致。]
	 * @return [type]              [description]
	 */
	public function video_height($video_height) {
		$this->video_height = $video_height;
	}

	/**
	 * 设置视频格式
	 * @param  [number] $video_width [视频素材格式：5-FLV，6-MP4，7-OGG，8-WebM。]
	 * @return [type]              [description]
	 */
	public function video_format($video_format) {
		$this->video_format = $video_format;
	}

	/**
	 * 设置广告主的中文名
	 * @param  [string] $video_width [广告主的中文名称(youku 要求必填项)]
	 * @return [type]              [description]
	 */
	public function advertiser($advertiser) {
		$this->advertiser = $advertiser;
	}

	/**
	 * 设置创意类型
	 * @param  [number] $video_width [创意类型：0-贴片（默认），1-角标，2-overlay]
	 * @return [type]              [description]
	 */
	public function creative_type($creative_type = 0) {
		$this->creative_type = $creative_type;
	}

	/**
	 * 设置创意标题
	 * @param  [string] $video_width [创意标题（pic_urls,title, text 不能同时为空）]
	 * @return [type]              [description]
	 */
	public function title($title) {
		$this->title = $title;
	}

	/**
	 * 设置创意文字内容
	 * @param  [string] $video_width [创意文字内容（pic_urls,title, text不能同时为空）]
	 * @return [type]              [description]
	 */
	public function text($text) {
		$this->text = $text;
	}

	/**
	 * 添加PC端静态创意
	 * @return [type] [description]
	 */
	public function pcAdd() {
		$this->vmtype = 'pc_add';
		$this->http = $this->conf['api_https']['creatives']['pc_add'];
	}

	/**
	 * 更新PC端静态创意
	 * @return [type] [description]
	 */
	public function pcUpdate() {
		$this->vmtype = 'pc_update';
		$this->http = $this->conf['api_https']['creatives']['pc_update'];
	}

	/**
	 * 查询上传的PC静态创意信息
	 * @return [type] [description]
	 */
	public function pcGet() {
		$this->vmtype = 'pc_get';
		$this->http = $this->conf['api_https']['creatives']['pc_get'] . '?id=' . $this->id;
	}

	/**
	 * 查询创意审核状态
	 * @return [type] [description]
	 */
	public function pcStatus() {
		$this->vmtype = 'pc_status';
		$this->http = $this->conf['api_https']['creatives']['pc_status'] . '?id=' . $this->id;
	}

	/**
	 * 添加CPE创意
	 * @return [type] [description]
	 */
	public function CPEAdd() {
		$this->vmtype = 'cpe_add';
		$this->http = $this->conf['api_https']['creatives']['cpe_add'];
	}

	/**
	 * 更新CPE创意
	 * @return [type] [description]
	 */
	public function CPEUpdate() {
		$this->vmtype = 'cpe_update';
		$this->http = $this->conf['api_https']['creatives']['cpe_update'];
	}

	/**
	 * 获取CPE创意信息
	 * @return [type] [description]
	 */
	public function CPEGet() {
		$this->vmtype = 'cpe_get';
		$this->http = $this->conf['api_https']['creatives']['cpe_get'] . '?id=' . $this->id;
	}

	/**
	 * 获取CPE创意审核状态
	 * @return [type] [description]
	 */
	public function CPEStatus() {
		$this->vmtype = 'cpe_status';
		$this->http = $this->conf['api_https']['creatives']['cpe_status'] . '?id=' . $this->id;
	}

	/**
	 * 添加PC视频创意
	 * @return [type] [description]
	 */
	public function pcVideoAdd() {
		$this->vmtype = 'pc_video_add';
		$this->http = $this->conf['api_https']['creatives']['pc_video_add'];
	}

	/**
	 * 更新PC视频创意
	 * @return [type] [description]
	 */
	public function pcVideoUpdate() {
		$this->vmtype = 'pc_video_update';
		$this->http = $this->conf['api_https']['creatives']['pc_video_update'];
	}

	/**
	 * 获取PC视频创意信息
	 * @return [type] [description]
	 */
	public function pcVideoGet() {
		$this->vmtype = 'pc_video_get';
		$this->http = $this->conf['api_https']['creatives']['pc_video_get'] . '?id=' . $this->id;
	}

	/**
	 * 获取PC视频创意审核状态
	 * @return [type] [description]
	 */
	public function pcVideoStatus() {
		$this->vmtype = 'pc_video_status';
		$this->http = $this->conf['api_https']['creatives']['pc_video_status'] . '?id=' . $this->id;
	}

	/**
	 * 添加移动WAP创意
	 * @return [type] [description]
	 */
	public function mobileWapAdd() {
		$this->vmtype = 'mobile_wap_add';
		$this->http = $this->conf['api_https']['creatives']['mobile_wap_add'];
	}

	/**
	 * 更新移动WAP创意
	 * @return [type] [description]
	 */
	public function mobileWapUpdate() {
		$this->vmtype = 'mobile_wap_update';
		$this->http = $this->conf['api_https']['creatives']['mobile_wap_update'];
	}

	/**
	 * 添加移动APP创意
	 * @return [type] [description]
	 */
	public function mobileInappAdd() {
		$this->vmtype = 'mobile_app_add';
		$this->http = $this->conf['api_https']['creatives']['mobile_app_add'];
	}

	/**
	 * 更新移动APP创意
	 * @return [type] [description]
	 */
	public function mobileInappUpdate() {
		$this->vmtype = 'mobile_app_update';
		$this->http = $this->conf['api_https']['creatives']['mobile_app_update'];
	}

	/**
	 * 查询移动端上传的创意信息
	 * @return [type] [description]
	 */
	public function mobileGet() {
		$this->vmtype = 'mobile_get';
		$this->http = $this->conf['api_https']['creatives']['mobile_get'] . '?id=' . $this->id;
	}

	/**
	 * 查询移动端上传的创意状态
	 * @return [type] [description]
	 */
	public function mobileStatus() {
		$this->vmtype = 'mobile_status';
		$this->http = $this->conf['api_https']['creatives']['mobile_status'] . '?id=' . $this->id;
	}

	/**
	 * 添加移动视频创意
	 * @return [type] [description]
	 */
	public function mobileVideoAdd() {
		$this->vmtype = 'mobile_video_add';
		$this->http = $this->conf['api_https']['creatives']['mobile_video_add'];
	}

	/**
	 * 更新移动视频创意
	 * @return [type] [description]
	 */
	public function mobileVideoUpdate() {
		$this->vmtype = 'mobile_video_update';
		$this->http = $this->conf['api_https']['creatives']['mobile_video_update'];
	}

	/**
	 * 获取移动视频创意信息
	 * @return [type] [description]
	 */
	public function mobileVideoGet() {
		$this->vmtype = 'mobile_video_get';
		$this->http = $this->conf['api_https']['creatives']['mobile_video_get'] . '?id=' . $this->id;
	}

	/**
	 * 获取移动视频创意审核状态
	 * @return [type] [description]
	 */
	public function mobile_video_status() {
		$this->vmtype = 'mobile_video_status';
		$this->http = $this->conf['api_https']['creatives']['mobile_video_status'] . '?id=' . $this->id;
	}

	/**
	 * 格式化创意数据
	 * @return [type] [description]
	 */
	public function formatData() {
		switch ($this->vmtype) {
		case 'pc_update':
			$this->data = array(
				'id' => $this->id,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'category' => $this->category,
				'html_snippet' => $this->html_snippet,
				'adomain_list' => $this->adomain_list,
			);
			break;
		case 'mobile_wap_add':
			$this->data = array(
				'id' => $this->id,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'category' => $this->category,
				'html_snippet' => $this->html_snippet,
				'adomain_list' => $this->adomain_list,
				'advertiser' => $this->advertiser,
			);
			break;
		case 'mobile_wap_update':
			$this->data = array(
				'id' => $this->id,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'category' => $this->category,
				'html_snippet' => $this->html_snippet,
				'adomain_list' => $this->adomain_list,
				'advertiser' => $this->advertiser,
			);
			break;
		case 'mobile_app_add':
			$this->data = array(
				'id' => $this->id,
				'landingpage' => $this->landingpage,
				'width' => $this->width,
				'height' => $this->height,
				'adtype' => $thi->adtype,
				'format' => $this->format,
				'category' => $this->category,
				'adomain_list' => $this->adomain_list,
				'pic_urls' => $this->pic_urls,
				'title' => $this->title,
				'text' => $this->text,
				'advertiser' => $this->advertiser,
			);
			break;
		case 'mobile_app_update':
			$this->data = array(
				'id' => $this->id,
				'landingpage' => $this->landingpage,
				'width' => $this->width,
				'height' => $this->height,
				'adtype' => $thi->adtype,
				'format' => $this->format,
				'category' => $this->category,
				'adomain_list' => $this->adomain_list,
				'pic_urls' => $this->pic_urls,
				'title' => $this->title,
				'text' => $this->text,
				'advertiser' => $this->advertiser,
			);
			break;
		case 'mobile_video_add':
			$this->data = array(
				'id' => $this->id,
				'category' => $this->category,
				'duration' => $this->duration,
				'fileurl' => $this->file_url,
				'landingpage' => $this->landingpage,
				'adomain_list' => $this->adomain_list,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'advertiser' => $this->advertiser,
				'creative_type' => $this->creative_type,
			);
			break;
		case 'mobile_video_update':
			$this->data = array(
				'id' => $this->id,
				'category' => $this->category,
				'duration' => $this->duration,
				'fileurl' => $this->file_url,
				'landingpage' => $this->landingpage,
				'adomain_list' => $this->adomain_list,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'advertiser' => $this->advertiser,
				'creative_type' => $this->creative_type,
			);
			break;
		case 'cpe_add':
			$this->data = array(
				'id' => $this->id,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'category' => $this->category,
				'pic_url' => $this->pic_urls,
				'adomain_list' => $this->adomain_list,
				'landingpage' => $this->landingpage,
				'visible_urls' => $this->visible_urls,
				'cpe_info' => $this->cpe_info,
			);
			break;
		case 'cpe_update':
			$this->data = array(
				'id' => $this->id,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'category' => $this->category,
				'pic_url' => $this->pic_urls,
				'adomain_list' => $this->adomain_list,
				'landingpage' => $this->landingpage,
				'visible_urls' => $this->visible_urls,
				'cpe_info' => $this->cpe_info,
			);
			break;
		case 'pc_video_add':
			$this->data = array(
				'id' => $this->id,
				'category' => $this->category,
				'duration' => $this->duration,
				'fileurl' => $this->fileurl,
				'landingpage' => $this->landingpage,
				'adomain_list' => $this->adomain_list,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'advertiser' => $this->advertiser,
				'creative_type' => $this->creative_type,
			);
			break;
		case 'pc_video_update':
			$this->data = array(
				'id' => $this->id,
				'category' => $this->category,
				'duration' => $this->duration,
				'fileurl' => $this->fileurl,
				'landingpage' => $this->landingpage,
				'adomain_list' => $this->adomain_list,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'advertiser' => $this->advertiser,
				'creative_type' => $this->creative_type,
			);
			break;
		default: // pc_add
			$this->data = array(
				'id' => $this->id,
				'width' => $this->width,
				'height' => $this->height,
				'format' => $this->format,
				'category' => $this->category,
				'html_snippet' => $this->html_snippet,
				'adomain_list' => $this->adomain_list,
			);
			break;
		}
	}

	public function exec() {
		$this->curl->http = $this->http;
		$this->curl->header = $this->header;
		if ($this->vmtype == 'pc-update' || $this->vmtype == 'pc-add' || $this->vmtype == 'mobile-wap-add' || $this->vmtype == 'mobile-wap-update' || $this->vmtype == 'mobile-app-add' || $this->vmtype == 'mobile-app-update') {
			$this->curl->data = json_encode($this->data); //将数据转成json格式
			$this->response = $this->curl->post();
		} else {
			$this->response = $this->curl->get();
		}

	}

}