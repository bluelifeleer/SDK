<?php
$file = str_replace('\\', DIRECTORY_SEPARATOR, __DIR__ . DIRECTORY_SEPARATOR) . 'Autoloader.php';
if (is_file($file)) {
	require_once $file;
}
// require_once __DIR__ . '\Mailer\PHPMailerAutoload.php';
// use SDK\ValueMake;
// use SDK\BaiDuBES;
// use SDK\Tanx;
// use SDK\MiaoZhen;
// use SDK\Adinall;

/**
 * |-----------------------------------------------------------------------------
 * | Mixer Class
 * |-----------------------------------------------------------------------------
 * | Author bluelife
 * | Email thebulelife@outlook.com
 * | Date 2016-12-16
 * |-----------------------------------------------------------------------------
 */
class Mixer {
	private $mailer;
	private $conf;
	private $error_code;
	private $db;
	private $curl;
	private $write;
	private $valueMake;
	private $adinall;
	private $bes;
	private $tanx;
	private $redis;
	private $miaozhen;
	public function __construct($config) {
		$this->conf = $config;
		$this->error_code = '';
		$this->db = new MySqliDB($this->conf['db']['host'], $this->conf['db']['user'], $this->conf['db']['passwd'], $this->conf['db']['db_name'], $this->conf['db']['port']);
		$this->curl = new Curl();
		$this->write = new Write();
		$this->mailer = new PHPMailer;
		if($this->conf['mailer']['send_mailer']){
			//初始化邮件信息；
			$this->mailer_initialize();
		}
		$this->valueMake = new SDK\ValueMake\ValueMake($this->db, $this->curl, $this->conf['vm']);
		$this->adinall = new SDK\Adinall\Adinall($this->db, $this->curl, $this->conf['adinall']);
		$this->bes = new SDK\BaiDuBES\BaiDuBES($this->db, $this->curl, $this->conf['bes']);
		$this->tanx = new SDK\Tanx\Tanx($this->db, $this->curl, $this->conf['tanx']);
		$this->miaozhen = new SDK\MiaoZhen\MiaoZhen($this->db, $this->curl, $this->conf['mz']);
		// $this->redis = new PHPRedis($this->conf['redis']);

	}

	private function mailer_initialize() {
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$this->mailer->isSMTP(); // Set mailer to use SMTP
		$this->mailer->Host = $this->conf['mailer']['host']; // Specify main and backup SMTP servers
		$this->mailer->SMTPAuth = true; // Enable SMTP authentication
		$this->mailer->Username = $this->conf['mailer']['user_name']; // SMTP username
		$this->mailer->Password = $this->conf['mailer']['password']; // SMTP password
		$this->mailer->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$this->mailer->Port = $this->conf['mailer']['port']; // TCP port to connect to
		$this->mailer->CharSet = "utf-8"; //set encode
		$this->mailer->setFrom($this->conf['mailer']['set_form'][0], $this->conf['mailer']['set_form'][1]);
		if (isset($this->conf['mailer']['add_adderss']) && !empty($this->conf['mailer']['add_adderss']) && is_array($this->conf['mailer']['add_adderss'])) {
			foreach ($this->conf['mailer']['add_adderss'] as $value) {
				$this->mailer->addAddress($value[0], $value[1]);
			}
		}
		if (isset($this->conf['mailer']['add_reply_to']) && !empty($this->conf['mailer']['add_reply_to']) && is_array($this->conf['mailer']['add_reply_to'])) {
			foreach ($this->conf['mailer']['add_reply_to'] as $value) {
				$this->mailer->addReplyTo($value[0], $value[1]);
			}
		}
		if (isset($this->conf['mailer']['add_CC']) && !empty($this->conf['mailer']['add_CC']) && is_array($this->conf['mailer']['add_CC'])) {
			foreach ($this->conf['mailer']['add_CC'] as $value) {
				$this->mailer->addCC($value[0], $value[1]);
			}
		}
		if (isset($this->conf['mailer']['add_BCC']) && !empty($this->conf['mailer']['add_BCC']) && is_array($this->conf['mailer']['add_BCC'])) {
			foreach ($this->conf['mailer']['add_BCC'] as $value) {
				$this->mailer->addBCC($value[0], $value[1]);
			}
		}
		if (isset($this->conf['mailer']['add_attachment']) && !empty($this->conf['mailer']['add_attachment']) && is_array($this->conf['mailer']['add_attachment'])) {
			foreach ($this->conf['mailer']['add_attachment'] as $value) {
				$this->mailer->addAttachment($value[0], $value[1]);
			}
		}
	}

	public function send_mailer($msg) {
		$this->mailer->isHTML(true); // Set email format to HTML

		$this->mailer->Subject = date('Y-m-d H:i:s', time());
		$this->mailer->Body = $msg;
		$this->mailer->AltBody = $msg;

		if (!$this->mailer->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}

	public function get_version() {
		$tmp = '';
		foreach ($this->conf['ver'] AS $key => $value) {
			$tmp .= ucwords($key) . ':' . $value . PHP_EOL;
		}
		return $tmp;
	}

	private function getCreatives() {
		$sql = 'SELECT `st`.`tanx_category`,`st`.`tanx_user_id`,`ad`.`id`,`ad`.`borad_url`,`ad`.`j_url`,`ad`.`pic_path`,`ad`.`pic_width`,`ad`.`pic_height`,`ad`.`borad_name`,`ad`.`gxb_monitor_url`,`dur`.`adx_id` FROM (SELECT `shop_id`,`tanx_category`,`tanx_user_id`,`shop_title` FROM `huihe_marketing_system`.`store` WHERE `tanx_audit_status`=1 AND `tanx_category`!=0 AND `tanx_user_id`!="") AS `st` INNER JOIN `huihe_marketing_system`.`diy_ad_task` AS `ad` ON `ad`.`shop_id`=`st`.`shop_id` AND `ad`.`status`=1 AND `ad`.`is_del`=0 AND `ad`.`add_time`>="2016-01-01" AND `ad`.`status`=1 AND `ad`.`tanx_audit_stat`=0 LEFT JOIN `huihe_marketing_system`.`diy_unit_rules` AS `dur` ON `dur`.`unit_id`=`ad`.`unit_id`';

		echo $sql;

		$query = $this->db->query($sql);
		$result = $query ? $query->fetch_all(MYSQLI_ASSOC) : false ;
		return isset($result) && !empty($result) && is_array($result) ? $result : array();
	}


	/**
	 * 上传创意
	 */
	public function addCreatives(){
		//diy_unit_rules	保存规则库
		//unit_id			推广组id
		//adx_id			adx平台类型，(1:灵集; 2:BES; 3:TANX; 4:天卓电信; 5:Adinall;6:万流客)
		$result = $this->getCreatives();
		var_dump($result);
		exit;
		if(isset($result) && is_array($result) && !empty($result)){
			$this->distributionCreatives($result);
		}
	}

	/**
	 * 将不同渠道的创意分发到不同的渠道进行上传
	 * @param  [type] $creatives [description]
	 * @return [type]            [description]
	 */
	private function distributionCreatives($creatives){
		if(isset($creatives) && is_array($creatives) && !empty($creatives)){
			for ($i=0; $i < count($creatives); $i++) { 
				$adx_id = $creatives[$i]['adx_id'] && isset($creatives[$i]['adx_id']) && !empty($creatives[$i]['adx_id']) ? intval($creatives[$i]['adx_id']) : 3 ;
				switch($adx_id){
					case 1:		//Lingji
						$this->miaozhen->main($creatives[$i]);
					break;
					case 2:		//BES
						$this->bes->main($creatives[$i]);
					break;
					case 3:		//Tanx
						$this->tanx->main($creatives[$i]);
					break;
					case 4:		//ValueMake
						$this->valueMake->main($creatives[$i]);
					break;
					case 5:		//Adinall
						$this->adinall->main($creatives[$i]);
					break;
					default:	//Other
						var_dump('other');
					break;
				}
			}
		}
	}

	/**
	 * 获取创意审核状态
	 * @return [type] [description]
	 */
	public function getAuditStatus(){

	}
}