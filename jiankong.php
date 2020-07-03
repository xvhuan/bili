<?php
ignore_user_abort(true);
set_time_limit(0);
$a=1;
$b=1;
while($a=$b){
$b=file_get_contents("jiance.txt");
postcurl("https://fastmessage.cn/bili/dan.php");
sleep(10);
}

function postcurl($u){
$url=$u;
$ua='Mozilla/5.0 (Linux; Android 20; MI 8 SE Build/PKQ1.181121.001; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/74.0.3729.136 Mobile Safari/537.36';
$head="https://message.bilibili.com/";
$curl = curl_init();//初始化curl
curl_setopt($curl, CURLOPT_URL,$url);//访问的url
$httpheader[] = "Accept:application/json";
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