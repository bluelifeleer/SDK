<?php
$file = str_replace('\\', DIRECTORY_SEPARATOR, __DIR__ . DIRECTORY_SEPARATOR) . 'Autoloader.php';
if(is_file($file)){
	require_once $file;
}
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

	private function mailer_initialize(){
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$this->mailer->isSMTP(); // Set mailer to use SMTP
		$this->mailer->Host = 'smtp.qq.com'; // Specify main and backup SMTP servers
		$this->mailer->SMTPAuth = true; // Enable SMTP authentication
		$this->mailer->Username = '703294267@qq.com'; // SMTP username
		$this->mailer->Password = 'fqwjuuqxrrsfbfha'; // SMTP password
		$this->mailer->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
		$this->mailer->Port = 25; // TCP port to connect to
		$this->mailer->CharSet = "utf-8"; //set encode
		$this->mailer->setFrom('703294267@qq.com', 'tuibian');
		$this->mailer->addAddress('peng.li@koolbao.com', 'lipeng'); // Add a recipient
		// $mail->addAddress('ellen@example.com');               // Name is optional
		// $mail->addReplyTo('info@example.com', 'Information');
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	}

	public function send_mailer(){
		$this->mailer->isHTML(true); // Set email format to HTML

		$this->mailer->Subject = date('Y-m-d H:i:s',time());
		$this->mailer->Body = '测试';
		$this->mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if (!$this->mailer->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}

	public function get_version() {
		foreach ($this->conf['ver'] AS $key => $value) {
			echo ucwords($key) . ':' . $value . PHP_EOL;
		}
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