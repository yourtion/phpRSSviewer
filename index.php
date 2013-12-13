<ul id="aList">
	<?php
	include_once('header.php');
	$sourse = file_get_contents("rss.json");
	$rssList =json_decode($sourse,true);
	//var_dump($rssList) ;
	foreach ($rssList as $key => $value){
		echo listAuthor($key,$value['author'],$value['avatar']);
	}
	?>
</ul>
<?php
include_once('footer.php');
?>