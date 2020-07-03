<?php
date_default_timezone_set('PRC');
$sendurl="https://api.bilibili.com/x/v2/dm/search?oid=199356056&type=1&keyword=&order=ctime&sort=desc&pn=1&ps=50";
$dan=postcurl($sendurl);
$json=json_decode($dan,true);
$arr=$json["data"]["result"];

$xie=fopen("cun.txt","a+");
$j=file_get_contents("cun.txt");
$ar=explode(",",$j);
$dog=file_get_contents("dog.txt");
$dogg=explode(PHP_EOL,$dog);
$doggg=$dogg[array_rand($dogg)];
$time=date("Y年m月d日D");
$dog=urlencode($time."  晴  ".$doggg);
for($i=0;$i<=50;$i++){
$uid=$arr[$i]["mid"];
if(!in_array($uid,$ar)){
gettcurl("https://fastmessage.cn/bili/send.php?uid=$uid&con=$dog");
gettcurl("https://fastmessage.cn/bili/send.php?uid=$uid&con=您的日记已发送，请查收（IOS用户请使用网页端查收）");
fwrite($xie,",".$uid);
}
}

function gettcurl($url){
$curl = curl_init();//初始化curl
curl_setopt($curl, CURLOPT_URL,$url);//访问的url
curl_exec($curl);//执行curl;
curl_close($curl); // 关闭CURL会话
}

function postcurl($u){
$url=$u;
$ua='Mozilla/5.0 (Linux; Android 20; MI X Build/PKQ1.181121.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36';
$head="https://message.bilibili.com/";
$curl = curl_init();//初始化curl
curl_setopt($curl, CURLOPT_URL,$url);//访问的url
$httpheader[] = "Accept-Language:zh-CN,zh;q=0.8";
$httpheader[] = "origin:https://passport.bilibili.com";
$httpheader[] = "X-FORWARDED-FOR:49.130.128.221";
$httpheader[] = "CLIENT-IP:49.130.128.221";
curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);
$file=file_get_contents("1.txt");
curl_setopt($curl, CURLOPT_COOKIE,$file);//发送cookie
curl_setopt($curl, CURLOPT_REFERER,$head);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);//获取的信息以文件流的方式
curl_setopt($curl, CURLOPT_USERAGENT, $ua);//设置UA
$a=curl_exec($curl);//执行curl;
curl_close($curl); // 关闭CURL会话
return $a;
}
?>