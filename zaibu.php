<?php
$a=fopen("jiance.txt","w+");
fwrite($a,"0");
sleep(20);
$b=fopen("jiance.txt","w+");
fwrite($b,"1");
postcurl("https://fastmessage.cn/bili/jiankong.php");
function postcurl($url){
$curl = curl_init();//初始化curl
curl_setopt($curl, CURLOPT_URL,$url);//访问的url
curl_exec($curl);//执行curl;
curl_close($curl); // 关闭CURL会话
}
?>