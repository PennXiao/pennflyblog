---
layout: post
title:  php拓展curl使用说明与范例
category:  PHP
---

## PHP curl使用说明与范例

### 依赖  

	curl 依赖PHP curl 拓展请使用php -m检查环境拓展 

### demo - Curl

#### init創建Curl資源
	// 创建一个新cURL资源
	$ch = curl_init();

#### 设置Curl传输详情
单个设置

	// 设置 cURL 传输选项 
	curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
	curl_setopt($ch, CURLOPT_HEADER, 0);

批量設置

	// 批量设置 cURL 传输选项 可以与单个设置混合使用
	$options = [
		CURLOPT_URL => 'http://www.example.com/',
		CURLOPT_HEADER => false
	];
	curl_setopt_array($ch, $options);

參考詳情

	//具体setopt详细参数请参考 http://php.net/manual/zh/function.curl-setopt.php


#### 执行curl

	if(curl_exec($ch) === false){
		//执行错误处理
	}
    
#### 獲取返回資源句柄

	//获取获取一个cURL连接资源句柄的信息 
	curl_getinfo($ch,句柄常量)
	//具体的常量参考 http://php.net/manual/zh/function.curl-getinfo.php


#### 關閉curl資源

	// 关闭cURL资源，并且释放系统资源
	curl_close($ch);