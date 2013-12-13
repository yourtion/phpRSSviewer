<?php
include_once('header.php');
include_once('lastRSS.php');
$sourse = file_get_contents("rss.json");
$rssList =json_decode($sourse,true);
//echo $rssList[$_GET['author']]['sourse'];
$rssURL = $rssList[$_GET['author']]['sourse'];
$rss=new lastRSS;            //实例化
$rss->cache_dir='cache';    //设置缓存目录，要手动建立
$rss->cache_time=3600;    //设置缓存时间。默认为0，即随访问更新缓存；建议设置为3600，一个小时
$rss->default_cp='UTF-8';    //设置字符编码，默认为UTF-8
$rss->items_limit=10;        //设置输出数量，默认为10
$rss->date_format='U';        //设置时间格式。默认为字符串；U为时间戳，可以用date设置格式
$rss->stripHTML=false;        //设置过滤html脚本。默认为false，即不过滤
$rss->CDATA='content';        //设置处理CDATA信息。默认为nochange。另有strip和content两个选项
$rs=$rss->Get($rssURL);        //处理RSS并获取内容
//var_dump($rs);                //输出
echo '<ul>';
foreach ($rs['items'] as $value){
	echo listItems($value['title'],$value['guid'],$_GET['author']);
}
echo '</ul>';
include('footer.php');