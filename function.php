<?php
function listAuthor($user, $name ,$avatar){
	$output = '<li><div class="listCard">';
	$output .='<a class="aListLink" href="list.php?author='.$user.'"><img src="'.$avatar.'" /></a>';
	$output .='<h2><a href="list.php?author='.$user.'">'.$name.'</a></h2>';
	$output .= '</div></li>';
	return $output;
}
function listItems($title,$guid,$author,$img){
	$output = '<li>';
	//$output .= '<span>'.$time.'</span>';
	$output .= '<a href="view.php?guid='.urlencode($guid).'&author='.$author.'"><div  class="lImg" ><img src="'.$img.'!mappList" /></div>';
	$output .= $title.'</a></li>';
	return $output;
}