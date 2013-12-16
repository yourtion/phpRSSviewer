<div data-role="panel" id="left-panel" data-theme="a" data-dom-cache="true">
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