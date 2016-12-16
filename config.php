<?php

/**
 * database Configtions
 */
$config['db']['host'] = 'rm-bp161jfen84tpr7d2o.mysql.rds.aliyuncs.com';
$config['db']['user'] = 'huihex';
$config['db']['passwd'] = 'koolma2010';
$config['db']['db_name'] = 'huihe_marketing_system';
$config['db']['port'] = 3306;

/**
 * baidu BES configtions
 */
$config['bes'] = [
	'dspId' => '18010532',
	'token' => 'c1cab1eb74dd83561cc042cd713b24d9',
	'api_https' => [
		'advertisers' => [
			'add' => 'https://api.es.baidu.com/v1/advertiser/add',
			'update' => 'https://api.es.baidu.com/v1/advertiser/update',
			'getAll' => 'https://api.es.baidu.com/v1/advertiser/getAll',
			'get' => 'https://api.es.baidu.com/v1/advertiser/get',
			'queryQualification' => 'https://api.es.baidu.com/v1/advertiser/queryQualification',
			'queryOpenDomainState' => 'https://api.es.baidu.com/v1/opendomain/queryOpenDomainState',
		],
		'creatives' => [
			'add' => 'https://api.es.baidu.com/v1/creative/add',
			'update' => 'https://api.es.baidu.com/v1/creative/update',
			'getAll' => 'https://api.es.baidu.com/v1/creative/getAll',
			'get' => 'https://api.es.baidu.com/v1/creative/get',
			'queryAuditState' => 'https://api.es.baidu.com/v1/creative/queryAuditState',
			'getTradeModified' => 'https://api.es.baidu.com/v1/creative/getTradeModified',
			'dynamicGetAll' => 'https://api.es.baidu.com/v1/creative/dynamic/getAll',
			'preview' => 'https://api.es.baidu.com/v1/website/creative/preview',
		],
		'report' => [
			'rtb' => 'https://api.es.baidu.com/v1/report/rtb',
			'consume' => 'https://api.es.baidu.com/v1/report/consume',
			'advertiser' => 'https://api.es.baidu.com/v1/report/advertiser',
			'creativeRTB' => 'https://api.es.baidu.com/v1/report/creativeRTB',
		],
		'cookie' => [
			'add' => 'https://api.es.baidu.com/v1/viewconfig/cookie/batch/add',
			'del' => 'https://api.es.baidu.com/v1/viewconfig/cookie/batch/del',
		],
	],
];

/**
 * Tanx configtions
 */
$config['tanx'] = [
	'appKey' => '23343680',
	'appSecret' => '649898950e521f4a3834543c284d39bb',
	'api_https' => [
		'advertisers' => [
			//广告主资质查询接口
			'tanx_qualification_find' => 'http://121.196.234.173:8080/kmwz/qualificationFind.do?jsonText=',
			//广告主资质提交接口
			'tanx_qualification_add' => 'http://121.196.234.173:8080/kmwz/addQualifications.do?jsonText=',
			//广告主资质修改接口
			'tanx_qualification_modify' => 'http://121.196.234.173:8080/kmwz/modifyQualifications.do?jsonText=',
			//获取客户固态共享资质接口
			'tanx_qualification_solid_find' => 'http://121.196.234.173:8080/kmwz/qualificationSolidFind.do?jsonText=',
		],
		'creatives' => [
			//批量获取创意审核状态接口
			'tanx_creatives_get' => 'http://121.196.234.173:8080/kmwz/getAllCreativeStatus.do?jsonText=',
			//获取单个创意审核状态接口
			'tanx_creative_get' => 'http://121.196.234.173:8080/kmwz/getCreativeStatus.do?jsonText=',
			//创意上传预审接口
			'tanx_audit_creative_add' => 'http://121.196.234.173:8080/kmwz/upCreative.do?jsonText=',
			//创意修改接口
			'tanx_audit_creative_modify' => 'http://121.196.234.173:8080/kmwz/creativeModify.do?jsonText=',
			//批量获取本地模板信息
			'tanx_nativetemplates_get' => 'http://121.196.234.173:8080/kmwz/nativetemplatesGetAction.do?jsonText=',
		],
	],
];

/**
 * ValueMask configtions
 */
$config['vm'] = [
	'user_name' => 'vamaker-huihe',
	'passwd' => 'ad3548dafHUIHEX2016',
	'api_https' => [
		'advertisers' => [],
		'creatives' => [
			'pc_add' => 'http://ssp.vamaker.com/api/banner/add',
			'pc_update' => 'http://ssp.vamaker.com/api/banner/update',
			'pc_get' => 'http://ssp.vamaker.com/api/banner/get',
			'pc_status' => 'http://ssp.vamaker.com/api/banner/status',
			'mobile_wap_add' => 'http://ssp.vamaker.com/api/mobile/web-add',
			'mobile_wap_update' => 'http://ssp.vamaker.com/api/mobile/web-update',
			'mobile_app_add' => 'http://ssp.vamaker.com/api/mobile/inapp-add',
			'mobile_app_update' => 'http://ssp.vamaker.com/api/mobile/inapp-update',
			'mobile_status' => 'http://ssp.vamaker.com/api/mobile/status',
			'mobile_get' => 'http://ssp.vamaker.com/api/mobile/get',
		],
	],
	'test_api_https' => [
		'pc_add' => 'http://testssp.vamaker.com/api/banner/add',
		'pc_update' => 'http://testssp.vamaker.com/api/banner/update',
		'pc_get' => 'http://testssp.vamaker.com/api/banner/get',
		'pc_status' => 'http://testssp.vamaker.com/api/banner/status',
		'mobile_wap_add' => 'http://testssp.vamaker.com/api/mobile/web-add',
		'mobile_wap_update' => 'http://testssp.vamaker.com/api/mobile/web-update',
		'mobile_app_add' => 'http://testssp.vamaker.com/api/mobile/inapp-add',
		'mobile_app_update' => 'http://testssp.vamaker.com/api/mobile/inapp-update',
		'mobile_status' => 'http://testssp.vamaker.com/api/mobile/status',
		'mobile_get' => 'http://testssp.vamaker.com/api/mobile/get',
	],
];

/**
 * Adinall configtions
 */
$config['adinall'] = [
	'id' => '', // 聚告PMP 提供的dspid，由32 位字符串组成。
	'publicKey' => '', // 聚告PMP 提供的密钥，16 位字符串组成。
	'signTime' => '', // Unix timestamp 时间戳精确到秒，格式1463643640
	'token' => '', // md5(id+publicKey+signTime)，注意字段md5 顺序
	'apt_https' => [
		'advertisers' => [],
		'creatives' => [
			'add' => 'http://creative.adinall.com/batchSync', //素材提交可以批量,[200最多]
			'update' => 'http://creative.adinall.com/update', //更新只能一次一条,超过数量则本次请求全部失败。
			'get' => '',
			'status' => 'http://creative.adinall.com/status', //一次限100 条广告素材ID，超过数量则本次请求全部失败。
			'report' => 'http://creative.adinall.com/report',
		],
	],
];

/**
 * MZ configtions
 */
$config['mz'] = [
	'dspId' => '11187',
	'token' => '0e700c48f8734900871b6593b146b41a',
	'api_https' => [
		'advertisers' => [],
		'creatives' => [
			'add' => 'http://adexchange.thextrader.cn/dsp/v2/api/upload', //创意上传
			'status' => 'http://adexchange.thextrader.cn/dsp/v2/api/status', //获取指定创意的审核状态
			'reject' => 'http://adexchange.thextrader.cn/dsp/api/reject', //获取指定时间之后上传物料的审核结果
			'report' => 'http://adexchange.thextrader.cn/dsp/api/report', //报表获取
			'adplacements' => 'http://adexchange.thextrader.cn/dsp/api/adplacements', //广告位信息获取API
		],
	],
];