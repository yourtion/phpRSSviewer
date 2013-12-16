<?php
include_once('header.php');
?>
<div data-role="page" id="demo-page" data-url="demo-page">
	<div data-role="header" >
		<a href="#left-panel" data-icon="bars" data-iconpos="notext">Menu</a>
		<h1>墨筹漫画</h1>
	</div>
	<!-- /header -->
	<div data-role="content">
		<dl>
			<dt>Swipe <span>verb</span></dt>
			<dd><b>1.</b> to strike or move with a sweeping motion</dd>
		</dl>
		<ul data-role="listview">

		</ul>
	</div>
	<!-- /content -->
	<div data-role="panel" id="left-panel" data-theme="a" >
		<ul data-role="listview" data-filter="true" data-inset="true" data-filter-placeholder="作者搜索">
			<?php
			$sourse = file_get_contents("rss.json");
			$rssList =json_decode($sourse,true);
			foreach ($rssList as $key => $value){
				echo panelAuthor($key,$value['author'],$value['avatar'],$value['profile']);
			}
			?>
		</ul>
	</div>
	<!-- /panel -->
<script>

</script>
</div>

<?php
include_once('footer.php');
?>
