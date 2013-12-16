<?php
include_once('header.php');
?>
<div id="aHeader"><img src="images/mcmh.png"></div>
<div class="clean"></div>
<div id="aContent">
<ul id="aList">
<?php
	$sourse = file_get_contents("rss.json");
	$rssList =json_decode($sourse,true);
	//var_dump($rssList) ;
	foreach ($rssList as $key => $value){
		echo listAuthor($key,$value['author'],$value['avatar']);
	}
	?>
</ul>
	<div class="clean"></div>
</div>

<?php
include_once('footer.php');
?>
