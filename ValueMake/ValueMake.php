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
	private $category；
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
	public function __construct($curl, $conf) {
		$this->curl = $curl;
		$this->conf = $conf;
	}


	public function id($id){
		$this->id = $id;
	}

	public function width($width){
		$this->width = $width;
	}

	public function height($height){
		$this->height = $height;
	}

	public function format($format){
		$this->format = $format;
	}

	public function category($category){
		$this->category = $category;
	}

	public function html_snippet($html_snippet){
		$this->html_snippet = $html_snippet;
	}

	public function adomain_list($adomain_list){
		$this->adomain_list = $adomain_list;
	}

	public function pic_urls($pic_urls){
		$this->pic_urls = $pic_urls;
	}

	public function landingpage($landingpage){
		$this->landingpage = $landingpage;
	}

	public function visible_urls($visible_urls){
		$this->visible_urls = $visible_urls;
	}

	public function cpe_info(){
		$this->cpe_info = array(array(
			'file_url' => $this->file_url,
			'duration' => $this->duration,
			'width' => $this->video_width,
			'height' => $this->video_height,
			'format' => $this->video_format,
		));
	}


	public function file_url($file_url){
		$this->file_url = $file_url;
	}

	public function file_url($duration){
		$this->duration = $duration;
	}

	public function file_url($video_width){
		$this->video_width = $video_width;
	}

	public function file_url($video_height){
		$this->video_height = $video_height;
	}

	public function file_url($video_format){
		$this->video_format = $video_format;
	}

	public function file_url($advertiser){
		$this->advertiser = $advertiser;
	}

	public function file_url($creative_type){
		$this->creative_type = $creative_type;
	}

	public function file_url($title){
		$this->title = $title;
	}

	public function file_url($text){
		$this->text = $text;
	}

}