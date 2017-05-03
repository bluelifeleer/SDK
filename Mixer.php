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
		//初始化邮件信息；
		$this->mailer_initialize();
		$this->valueMake = new SDK\ValueMake\ValueMake($this->curl, $this->conf['vm']);
		$this->adinall = new SDK\Adinall\Adinall($this->curl, $this->conf['adinall']);
		$this->bes = new SDK\BaiDuBES\BaiDuBES($this->curl, $this->conf['bes']);
		$this->tanx = new SDK\Tanx\Tanx($this->curl, $this->conf['tanx']);
		$this->miaozhen = new SDK\MiaoZhen\MiaoZhen($this->curl, $this->conf['mz']);
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

	public function getCreatives() {
		$this->db->select(array('*'));
		$this->db->from('diy_ad_task');
		// $this->db->where('status',1);
		$this->db->limit(20, 0);
		// $this->db->get();
		$count = $this->db->count_all('diy_ad_task');
		var_dump($this->db->last_query());
		var_dump($count);
		// $query = $this->db->array_result();
		// var_dump($query);
	}
}