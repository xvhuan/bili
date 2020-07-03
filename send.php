<?php
$uid=$_GET["uid"];
$con=$_GET["con"];
$sendurl="https://api.vc.bilibili.com/web_im/v1/web_im/send_msg";
$time=time();
$file=file_get_contents("1.txt");
$token=strstr($file,"bili_jct");
$token=strstr($token,";",true);
$token=substr($token,9);
$post='msg[sender_uid]=269338434&msg[receiver_id]='.$uid.'&msg[receiver_type]=1&msg[msg_type]=1&msg[msg_status]=0&msg[content]=%7B%22content%22%3A%22'.$con.'%22%7D&msg[timestamp]='.$time.'&build=0&mobi_app=web&csrf_token='.$token;
echo postcurl($sendurl,1,$post);

function postcurl($u,$p,$pn){
$url=$u;
$ua='Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36';
$head="https://message.bilibili.com/";
$curl = curl_init();//初始化curl
curl_setopt($curl, CURLOPT_URL,$url);//访问的url
$httpheader[] = "content-type:application/x-www-form-urlencoded";
$httpheader[] = "Accept-Language:zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7";
$httpheader[] = "origin:https://message.bilibili.com";
$httpheader[] = "accept:application/json, text/plain, */*";
$httpheader[] = "accept-encoding:gzip, deflate";
$httpheader[] = "X-FORWARDED-FOR:49.130.128.221";
$httpheader[] = "CLIENT-IP:49.130.128.221";
curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);
$file=file_get_contents("1.txt");
curl_setopt($curl, CURLOPT_COOKIE,$file);//发送cookie
if($p){
curl_setopt($curl, CURLOPT_POST, 1);//开启post
curl_setopt($curl, CURLOPT_POSTFIELDS,$pn);//post参数
}
curl_setopt($curl, CURLOPT_REFERER,$head);
curl_setopt($curl, CURLOPT_USERAGENT, $ua);//设置UA
curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);//获取的信息以文件流的方式
$a=curl_exec($curl);//执行curl;
curl_close($curl); // 关闭CURL会话
return $a;
}
?>