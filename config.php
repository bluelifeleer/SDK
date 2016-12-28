<?php

/**
 * database Configtions
 */
$config['db']['host'] = 'rm-bp161jfen84tpr7d2o.mysql.rds.aliyuncs.com';
$config['db']['user'] = 'huihex';
$config['db']['passwd'] = 'koolma2010';
$config['db']['db_name'] = 'huihe_marketing_system';
$config['db']['port'] = 3306;

$config['ver'] = [
	'version' => '1.0',
	'author' => 'bluelife',
	'email' => 'thebulelife@outlook.com',
	'phone' => '15167167331',
	'add_time' => '2016-12-16',
	'modify_version' => '1.1',
	'modify_author' => 'bluelife',
	'modify_email' => 'thebulelife@outlook.com',
	'modify_phone' => '15167167331',
	'modify_add_time' => '2016-12-19',
];

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
	'tanx_http' => 'http://gw.api.taobao.com/router/rest',
	'tanx_https' => 'https://eco.taobao.com/router/rest',
	'tanx_http_tbsandbox' => 'http://gw.api.tbsandbox.com/router/rest',
	'tanx_https_tbsandbox' => 'https://gw.api.tbsandbox.com/router/rest',
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
		'cpe_add' => 'http://ssp.vamaker.com/api/banner-cpe/add',
		'cpe_update' => 'http://ssp.vamaker.com/api/banner-cpe/update',
		'cpe_get' => 'http://ssp.vamaker.com/api/banner-cpe/get',
		'cpe_status' => 'http://ssp.vamaker.com/api/banner-cpe/status',
		'pc_video_add' => 'http://ssp.vamaker.com/api/video/add',
		'pc_video_update' => 'http://ssp.vamaker.com/api/video/update',
		'pc_video_get' => 'http://ssp.vamaker.com/api/video/get',
		'pc_video_status' => 'http://ssp.vamaker.com/api/video/status',
		'mobile_wap_add' => 'http://testssp.vamaker.com/api/mobile/web-add',
		'mobile_wap_update' => 'http://testssp.vamaker.com/api/mobile/web-update',
		'mobile_app_add' => 'http://testssp.vamaker.com/api/mobile/inapp-add',
		'mobile_app_update' => 'http://testssp.vamaker.com/api/mobile/inapp-update',
		'mobile_video_add' => 'http://ssp.vamaker.com/api/mobile-video/add',
		'mobile_video_update' => 'http://ssp.vamaker.com/api/mobile-video/update',
		'mobile_status' => 'http://testssp.vamaker.com/api/mobile/status',
		'mobile_get' => 'http://testssp.vamaker.com/api/mobile/get',
		'mobile_video_get' => 'http://ssp.vamaker.com/api/mobile-video/get',
		'mobile_video_status' => 'http://ssp.vamaker.com/api/mobile-video/status',
	],
];

/**
 * Adinall configtions
 */
$config['adinall'] = [
	'id' => '71b239993210dee8bd76e00daa1676b7', // 聚告PMP 提供的dspid，由32 位字符串组成。
	'publicKey' => 't4^d*#3%o561%8fx', // 聚告PMP 提供的密钥，16 位字符串组成。
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

/**
 * http request status code
 */
$config['error_code'] = [
	'bes' => [
		'500' => '系统错误',
		'501' => '参数类型错误',
		'502' => '请求content type 错误',
		'503' => '非HTTP POST 请求错误',
		'504' => '请求参数缺失',
		'505' => '请求json错误',
		'800' => '请求验证头为空',
		'801' => 'Dsp id为空',
		'802' => '权限令牌为空',
		'803' => '没有权限或者验证错误',
		'804' => '不在设置列表中',
		'805' => '访问过于频繁，请稍后再试',
		'806' => '访问权限收回，请联系管理员',
		'100' => '参数为空',
		'102' => '参数数量超限',
		'200' => '请求时间格式错误',
		'202' => '服务器处理数量过大，请尝试缩小请求时间范围',
		'1001' => '广告主ID非法',
		'1002' => '广告主主体资质名称非法',
		'1004' => '单次请求中有重复的广告主ID',
		'1005' => '广告主网站名非法',
		'1006' => '广告主网站url非法',
		'1007' => '广告主通讯地址非法',
		'1008' => '广告主联系电话非法',
		'1009' => '广告主名称非法',
		'1010' => '广告主名称重复',
		'1011' => '广告主ID与数据库已有ID重复',
		'2000' => '创意类型错误',
		'2001' => '对操作客户无权限',
		'2002' => '非法或者重复的创意ID',
		'2003' => '非法创意行业',
		'2004' => '非法创意高宽',
		'2005' => '展现监测链接数量超限',
		'2006' => 'URL为空',
		'2007' => 'URL必须以http://开头',
		'2008' => 'URL包含非法字符',
		'2009' => 'URL字符存在错误',
		'2010' => 'URL长度超限',
		'2011' => '创意下载URL后缀错误,必须是jpg|gif|swf',
		'2012' => '创意素材下载地址或者二进制数据均未设置',
		'2013' => '创意图片大小超限',
		'2014' => '创意flash大小超限',
		'2015' => '创意图片错误',
		'2016' => '创意flash错误',
		'2017' => '创意高宽与定义不符',
		'2018' => '创意图片类型非法',
		'2019' => 'URL字符非法',
		'2020' => 'URL前缀非法',
		'2021' => 'URL后缀非法',
		'2022' => '当不更新素材图片或者flash时，type不允许修改',
		'2023' => '当更新素材图片或者flash时，type必须指定',
		'2024' => '当不更新素材图片或者flash时，高宽不允许修改',
		'2025' => '当更新素材图片或者flash时，高宽必须指定',
		'2026' => '创意ID不存在',
		'2027' => '无法通过creativeUrl下载创意素材',
		'2028' => '框架id过期',
		'2029' => '框架id非法',
		'2030' => '点击链接跳转超过3 次',
		'2031' => '点击链接最终url与到达页面不符',
		'2032' => '点击链接跳转过程中包含非法域',
		'2033' => '点击链接验证超时',
		'2034' => '广告展现监测链接数组包含非法域',
		'2035' => '点击链接验证失败',
		'2036' => '系统暂时不支持上传Admaker 制作的flash 物料',
		'2037' => '超过DSP创意预览阀值限制',
		'2038' => '请求参数创意列表为空',
		'2039' => '请求参数创意列表预览超过限制',
		'2040' => '指定的创意列表不存在',
		'2041' => '流量类型错误',
		'2042' => '当流量类型为mobile流量时，互动样式值不能为空',
		'2043' => '互动样式值不合法',
		'2044' => '当流量类型为“mobile流量“且互动样式为“电话直拨“，电话号码值不能为空',
		'2045' => '当流量类型为“mobile流量“且互动样式为“点击下载“，下载包地址值不能为空',
		'2046' => '当流量类型为“mobile流量“且互动样式为“点击下载“，应用名称值不能为空',
		'2047' => '当流量类型为“mobile流量“且互动样式为“点击下载“，应用介绍值不能为空',
		'2048' => '当流量类型为“mobile流量“且互动样式为“点击下载“，应用大小值不能为空',
		'2049' => '应用大小值超限',
		'2050' => '电话号码不合法',
		'2051' => '应用名称长度超限',
		'2052' => '应用介绍长度超限',
		'2053' => '创意视频大小超限',
		'2054' => '创意视频错误',
		'2055' => '视频创意码流超限',
		'2056' => '视频创意时长超限',
		'2057' => '视频播放时间监测错误',
		'2058' => '修改次数超过最大修改次数',
		'2059' => '创意在当前状态无法被更新',
		'2060' => '视频创意创意类型不需修改',
		'2061' => '图片创意和Flash创意不允许修改为视频创意',
		'2062' => '创意审核状态不合法',
		'2063' => '视频创意上传错误',
		'2064' => '视频创意转码失败',
	],
	'tanx' => [],
	'mz' => [
		'101' => '文件加载失败',
		'102' => '不支持的文件格式,目前支持的文件格式：jpg,gif,png,swf,flv,x',
		'103' => '根据素材url获取不到尺寸信息',
		'104' => '执行插入过程中发生了错误',
		'105' => '物料所属的广告主为空',
		'106' => '物料生效时间为空或者不能解析,注：时间格式为YYYY-mm-dd',
		'107' => '物料失效时间为空或者不能解析,注：时间格式为YYYY-mm-dd',
		'108' => '系统异常',
		'109' => '物料尺寸不符合广告位要求',
		'201' => '缺少必填的参数/crative类型不匹配',
		'202' => '参数格式错误',
		'203' => 'JSON数据格式错误',
		'401' => 'creativeId为空',
		'402' => '物料生效时间为空或格式错误无法解析',
		'403' => '物料失效时间为空或格式错误无法解析',
		'404' => '文件无法识别，目前支持的文件格式(jpg,gif,png,swf,flv,mp4,x)',
		'405' => '不支持的素材尺寸',
		'406' => '素材文件加载失败',
		'407' => '素材保存失败(素材保存到server本地失败)',
		'408' => '广告主保存失败',
		'409' => '创意保存失败',
		'410' => 'button_type 类型错误',
		'411' => 'mblog_text 字符数错误',
		'412' => 'title 字符数错误',
		'413' => 'desc 字符数错误',
		'414' => 'download app应用错误',
		'415' => 'PDB campaignId必填',
		'416' => '解析资源获取不到duration/width/height，或者上传参数中的duration/width/height验证未通过素材不符合Exchange平台要求',
		'417' => '数据库操作异常',
		'418' => '微博mid为空时，uid、mblog_text、pics必须存在',
		'419' => 'title长度约束问题',
		'420' => 'desc长度约束问题',
		'421' => 'download_info内部参数约束问题',
		'422' => '某些属性验证不通过',
		'423' => '某些约束验证不通过',
		'424' => 'dspid, token, creativeType三个属性当中出现问题',
		'425' => '开始日期没有早于结束日期',
		'426' => 'obj_id和uid, mblog_text, pics之间的约束关系有问题',
		'427' => 'campaignId和deliveryType之间的约束关系有问题',
		'428' => '至少出现数组[nativepic，nativevideo，title，desc]中的一个元素，且出现的元素值需要被校验通过',
	],
	'vm' => [
		// http状态错误码
		'status_code' => [
			'200' => '',
			'401' => '认证失败',
			'404' => '请求URL 错误，没有触发业务',
			'422' => '请求处理失败',
			'500' => '系统内部错误',
		],
		//业务错误码
		'business_code' => [
			'1000' => 'json 格式错误',
			'1001' => '创意ID 缺少或者错误',
			'1002' => '创意ID 重复',
			'1003' => '创意代码缺少',
			'1004' => '创意行业分类缺少或者错误',
			'1005' => '创意格式缺少或者错误',
			'1006' => '创意宽度缺少或者错误',
			'1007' => '创意高度缺少或者错误',
			'1008' => 'adomain_list 缺少或者错误',
			'1009' => '系统中创意ID 不存在',
			'1010' => '修改失败，创意状态异常',
			'1011' => '创意已过期（预留）',
			'1012' => '创意时长缺少或者错误',
			'1013' => '素材地址缺少或者错误',
			'1014' => 'landingpage 缺少或者错误',
			'1015' => 'landingpage 缺少点击检测宏{!vam_click_url}',
			'1016' => '没有调用该API 权限',
			'1017' => '移动创意上传方式缺少或错误',
			'1018' => '移动创意元素缺少或错误',
			'1019' => '移动创意更新与API 不符',
			'1020' => '移动创意ad_type 缺少或错误',
			'1021' => '移动创意元素类型错误',
		],
	],
	'adinall' => [
		'100' => 'URL错误',
		'101' => '不允许重复get方式',
		'102' => 'signtime超时',
		'103' => 'dspId匹配失败',
		'104' => 'token验证失败',
		'105' => '提交100条广告素材信息错误',
		'106' => 'cid不是由数字和字母组合而成',
		'107' => 'create时cid不允许重复',
		'108' => '字段为空',
		'109' => 'domain标签错误(包含了"<html>", "<body>", "<head>"或http)',
		'110' => 'domain target错误(如果存在target 只能使用_blank)',
		'111' => 'HTML没有包含click宏或者win notice宏',
		'112' => 'Category行业分类信息错误',
		'113' => 'size不符合规范错误(number*number 格式)',
		'114' => '数据库连接失败',
		'115' => 'signtime不符合规范(不等于十位或者不是由数字组成)',
		'116' => 'update提交超过1条广告素材信息错误',
		'117' => 'cid没有匹配',
		'118' => 'status请求超过100 条',
		'119' => 'json格式错误',
		'120' => 'dsp不能为空',
		'121' => 'signtime不能为空',
		'122' => 'updatecid不匹配',
		'123' => 'token不能为空',
		'124' => 'dspType字段不能为空',
		'125' => 'dspType不合法',
		'126' => '当原生信息流时,title不能为空',
		'127' => '当原生信息流时,desc不能为空 ',
		'128' => 'ldp不能为空',
		'129' => 'imgurl不能为空',
		'130' => 'clickreport不能为空',
		'131' => 'impressionreport不能为空',
		'132' => '查询报表时date不能为空',
		'133' => '查询报表时date格式错误',
		'134' => '查询报表未开通',
		'135' => 'DSP尚处于测试阶段',
	],
];