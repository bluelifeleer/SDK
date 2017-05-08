<?php
include_once __DIR__.'/config.php';
include_once __DIR__.'/Autoloader.php';
$CTP = new clientTop;
$DB = new MySqliDB($config['db']['host'], $config['db']['user'], $config['db']['passwd'], $config['db']['db_name'], $config['db']['port']);
$start_timer = date('Y-m-d 00:00:00',time());
$current_timer = date('Y-m-d H:i:s',time());
$sql = 'SELECT `st`.`tanx_category`,`st`.`tanx_user_id`,`ad`.`id`,`ad`.`borad_url`,`ad`.`j_url`,`ad`.`pic_path`,`ad`.`pic_width`,`ad`.`pic_height`,`ad`.`borad_name`,`ad`.`gxb_monitor_url`,`ad`.`add_time`,`ad`.`shop_id`,`dur`.`unit_id`,`dur`.`adx_id`,`dur`.`rules`,`dur`.`range_mode`,`dur`.`cpc` FROM (SELECT `shop_id`,`tanx_category`,`tanx_user_id`,`shop_title` FROM `huihe_marketing_system`.`store` WHERE `tanx_audit_status`=1 AND `tanx_category`!=0 AND `tanx_user_id`!="") AS `st` INNER JOIN `huihe_marketing_system`.`diy_ad_task` AS `ad` ON `ad`.`shop_id`=`st`.`shop_id` AND `ad`.`status`=1 AND `ad`.`is_del`=0 AND (`ad`.`add_time` BETWEEN "'.$start_timer.'" AND "'.$current_timer.'") AND `ad`.`tanx_audit_stat`=0 LEFT JOIN `huihe_marketing_system`.`diy_unit_rules` AS `dur` ON `dur`.`unit_id`=`ad`.`unit_id`';

$query = $DB->query($sql);
$result = $query ? $query->fetch_all(MYSQLI_ASSOC): array();

//	adx_id			adx平台类型，(1:灵集; 2:BES; 3:TANX; 4:天卓电信; 5:Adinall;6:万流客)
if(is_array($result) && !empty($result)){
	for($i=0;$i<count($result);$i++){
		switch(intval($result[$i]['adx_id'])){
			case 1:	//	1:灵集;
				$MZ = new SDK\MiaoZhen\MiaoZhen();
			break;
			case 2:	//	2:BES
				$BES = new SDK\BaiDuBES\BaiDuBES();
			break;
			case 3:	//	3:TANX;
				$Tanx = new SDK\Tanx\Tanx();
			break;
			case 4:	//	4:天卓电信
			break;
			case 5:	//	5:Adinall
				$Adinall = new SDK\Adinall\Adinall();
			break;
			case 6:	//	6:万流客
				$VM = new SDK\ValueMake\ValueMake();
			break;
			default:
			break;
		}
	}
}else{
	echo '没有需要上传的创意';
}

//$CTP->exec();