<?php
include_once('header.php');
if($_GET['author'] != ""){
	$sourse = file_get_contents("rss.json");
	$rssList =json_decode($sourse,true);
	//echo $rssList[$_GET['author']]['sourse'];
	$rs = getRSS($rssList[$_GET['author']]['sourse']);
	//echo urldecode($_GET['guid']);
}else{
	$rs = getRSS('http://manhua.morechou.com/feed');
}
$con = "";
$author ="";
$title = "";
foreach ($rs['items'] as $value){
	if($value['guid'] ==urldecode($_GET['guid']) ){
		$pattern = "/height=\"[0-9]*\"/";
		$content = preg_replace($pattern, "", $value['content:encoded']);
		$pattern = "/width=\"[0-9]*\"/";
		$content = preg_replace($pattern, '', $content);
		$author = $value['dc:creator'];
		$title = $value['title'];
		$con = $content;
	}
}
?>
<div data-role="page" id="view">
	<div data-role="header" id="pageHeader">
		<a href="#left-panel" data-icon="bars" data-iconpos="notext">Menu</a>
		<h1>@<?php echo $author; ?> 的漫画</h1>
	</div>
	<!-- /header -->
	<div data-role="content" id="viewContent">
		<h3><?php echo $title; ?></h3>
		<?php
			echo $con;
		?>
	</div>
	<!-- /content -->
	<?php include_once('panel.php') ?>
	<!-- /panel -->

</div>
<?php
include('footer.php');
?>
