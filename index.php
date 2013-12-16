<?php
include_once('header.php');
?>
<div data-role="page" id="index">
	<div data-role="header" >
		<a href="#left-panel" data-icon="bars" data-iconpos="notext">Menu</a>
		<h1>墨筹漫画</h1>
	</div>
	<!-- /header -->
	<div data-role="content">
		<ul data-role="listview" id="listAll" data-icon="false">
			<?php
			$rs = getRSS('http://manhua.morechou.com/feed');
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
include_once('footer.php');
?>
