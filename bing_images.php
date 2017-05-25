<?php
// 初始化 curl
$curlObj = curl_init();
/*
 * http://cn.bing.com/HPImageArchive.aspx
 * format:返回格式，可选 js/xml，非必须，默认值 xml
 *    idx:获取n天前的图片，非必须，默认值0
 *      n:输出条数，必须
 */
curl_setopt($curlObj, CURLOPT_URL, "http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1");
curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, true);
// 获取返回的json数据
$json = curl_exec($curlObj);
// 关闭curl
curl_close();
// 解析json
$de_json = json_decode($json);
$url = $de_json->images[0]->url;
// 拼接 URL
$url = 'http://cn.bing.com'.$url;

// 重定向至图片 url
header("Location:$url");
?>
