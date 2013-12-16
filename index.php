<?php
include_once('header.php');
?>
<div data-role="page" id="demo-page" data-url="demo-page">
	<div data-role="header" id="aHeader">
		<a href="#left-panel" data-role="button" role="button" >Menu</a>
		<h1><img src="images/mcmh.png" alt="墨筹漫画" /></h1>
	</div>
	<!-- /header -->
	<div data-role="content">
		<dl>
			<dt>Swipe <span>verb</span></dt>
			<dd><b>1.</b> to strike or move with a sweeping motion</dd>
		</dl>
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
		<a href="#demo-intro" data-rel="back" class="back-btn" data-role="button" data-mini="true" data-inline="true" data-icon="back" data-iconpos="right">Back to demo intro</a>
	</div>
	<!-- /content -->
	<div data-role="panel" id="left-panel" data-theme="a">
		<p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p><p>Left reveal panel.</p>
		<a href="#" data-rel="close" data-role="button" data-mini="true" data-inline="true" data-icon="delete" data-iconpos="right">Close</a>
	</div><!-- /panel -->
<script>

</script>
</div>

<?php
include_once('footer.php');
?>
