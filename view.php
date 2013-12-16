<?php
include_once('header.php');
include_once('lastRSS.php');
$sourse = file_get_contents("rss.json");
$rssList =json_decode($sourse,true);
//echo $rssList[$_GET['author']]['sourse'];
$rs = getRSS($rssList[$_GET['author']]['sourse']);
//echo urldecode($_GET['guid']);
?>
<div id="vContent">
<?php
foreach ($rs['items'] as $value){
	if($value['guid'] ==urldecode($_GET['guid']) ){
		echo '<h1>'.$value['title'].'</h1>';
		$pattern = "/height=\"[0-9]*\"/";
		$content = preg_replace($pattern, "", $value['content:encoded']);
		$pattern = "/width=\"[0-9]*\"/";
		$content = preg_replace($pattern, '', $content);
		echo '<h1>'.$content.'</h1>';
	}
}
?>
</div>
<style>
	body{
		background: #fff !important;
	}
</style>
<?php
include('footer.php');