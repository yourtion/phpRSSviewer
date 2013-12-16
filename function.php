<?php
include_once('lastRSS.php');
function listAuthor($user, $name ,$avatar){
	$output = '<li><div class="listCard">';
	$output .='<a class="aListLink" href="list.php?author='.$user.'"><img src="'.$avatar.'" /></a>';
	$output .='<h2><a href="list.php?author='.$user.'">'.$name.'</a></h2>';
	$output .= '</div></li>';
	return $output;
}
function panelAuthor($user, $name ,$avatar,$profile){
	$output = '<li><a href="list.php?author='.$user.'">';
	$output .= '<img src="'.$avatar.'">';
	$output .= '<h2>'.$name.'</h2><p>'.$profile.'</p>';
	$output .= '</a></li>';
	return $output;
}
function listItems($title,$guid,$author,$img){
	$output = '<li>';
	//$output .= '<span>'.$time.'</span>';
	$output .= '<a href="view.php?guid='.urlencode($guid).'&author='.$author.'"><div  class="lImg" ><img src="'.$img.'!mappList" /></div>';
	$output .= $title.'</a></li>';
	return $output;
}
function getRSS($soures){
	$rssURL = $soures;
	$rss=new lastRSS;            //实例化
	$rss->cache_dir='cache';    //设置缓存目录，要手动建立
	$rss->cache_time=3600;    //设置缓存时间。默认为0，即随访问更新缓存；建议设置为3600，一个小时
	$rss->default_cp='UTF-8';    //设置字符编码，默认为UTF-8
	$rss->items_limit=10;        //设置输出数量，默认为10
	$rss->date_format='U';        //设置时间格式。默认为字符串；U为时间戳，可以用date设置格式
	$rss->stripHTML=false;        //设置过滤html脚本。默认为false，即不过滤
	$rss->CDATA='content';        //设置处理CDATA信息。默认为nochange。另有strip和content两个选项
	$rsr=$rss->Get($rssURL);        //处理RSS并获取内容
//var_dump($rs);                //输出
	return $rsr;
}