<?php
include_once('header.php');

$sourse = file_get_contents("rss.json");
$rssList =json_decode($sourse,true);
//echo $rssList[$_GET['author']]['sourse'];
$rs = getRSS($rssList[$_GET['author']]['sourse']);

?>
<div id="bg"></div>
<div id="lHeader">
	<div class="lavatar">
	<img src="<?php echo $rssList[$_GET['author']]['avatar']; ?>" alt=""/>
	</div>
	<div class="lprofile">
		<h2><?php echo $rssList[$_GET['author']]['author']; ?></h2>
		<?php echo $rssList[$_GET['author']]['profile']; ?>
	</div>
	<div class="clean"></div>
</div>

<div id="lContent">

<ul>
<?php
foreach ($rs['items'] as $value){
	preg_match_all('/<img.*src="(.*)"\\s*.*>/iU',$value['content:encoded'],$match);
	echo listItems($value['title'],$value['guid'],$_GET['author'],$match[1][0]);
}
?>
</ul>
</div>
</div>
<?php
include('footer.php');