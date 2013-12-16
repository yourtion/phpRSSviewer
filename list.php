<?php
include_once('header.php');
$sourse = file_get_contents("rss.json");
$rssList =json_decode($sourse,true);
$rs = getRSS($rssList[$_GET['author']]['sourse']);
?>
	<div data-role="page" id="list">
		<div data-role="header" >
			<a href="#left-panel" data-icon="bars" data-iconpos="notext">Menu</a>
			<h1><?php echo $rssList[$_GET['author']]['author']; ?>的漫画</h1>
		</div>
		<!-- /header -->
		<div data-role="content">
			<ul data-role="listview" id="listAll" data-icon="false">
				<?php
				foreach ($rs['items'] as $value){
					preg_match_all('/<img.*src="(.*)"\\s*.*>/iU',$value['content:encoded'],$match);
					echo itemList($value['title'],$value['guid'],$_GET['author'],$match[1][0]);
				}
				?>
			</ul>
		</div>
		<!-- /content -->
		<?php include_once('panel.php') ?>
		<!-- /panel -->
	</div>
<?php
include('footer.php');