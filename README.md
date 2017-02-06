## SDK
#### beging new SDK project by bluelife for 2016-12-16

#### =======================================================================
#### 将万流客,灵集,百度BES,淘宝TANX,Adinall等渠道的上传广告主,获取广告主审核状态,上传创意,获取创意审核状态,等功能集合到一个SDK中通过混合器统一处理,再通过分发器单独分给不同的渠道PAI接口去处理细节问题,处理完成的数据更新到数据库中.
#### 本例提供redis操作，由于redis没有自己实现一个方法，而是直接爆露出一个初始化好的redis对象，并默认连接好数据库，所以可以根据redis文档中的所有方法使用
#### 技术点：
###### 
	spl_autoload_register注册给定的函数做为autoLoad的实现
	语法：bool spl_autoload_register ([ callable $autoload_function [, bool $throw = true [, bool $prepend = false ]]] )
	参数 

		autoload_function	欲注册的自动装载函数。如果没有提供任何参数，则自动注册 autoload 的默认实现函数spl_autoload()。
		throw			此参数设置了 autoload_function 无法成功注册时， spl_autoload_register()是否抛出异常。
		prepend			如果是 true，spl_autoload_register() 会添加函数到队列之首，而不是队列尾部。
	返回值
		成功时返回 TRUE， 或者在失败时返回 FALSE。

	DIRECTORY_SEPARATOR		获取系统中的分隔符
	PHP_EOL					获取系统中的换行符
#### =======================================================================
###### Author bluelife
###### Email thebulelife@outlook.com
###### Modify Date 2016-12-19
###### Modify Date 2017-02-06
###### Tel-Phone 15167167331
