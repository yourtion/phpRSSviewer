<?php
function listAuthor($user, $name ,$avatar){
	$output = '<li><div class="listCard">';
	$output .='<a href="list.php?author='.$user.'"><img src="'.$avatar.'" /></a>';
	$output .= '<a href="list.php?author='.$user.'"><h2>'.$name.'</h2></a>';
	$output .= '</div></li>';
	$output .= '</div></li>';
	return $output;
}
function listItems($title,$guid,$author){
	$output = '<li>';
	$output .= '<a href="view.php?guid='.urlencode($guid).'&author='.$author.'">'.$title.'</a>';
	$output .= '</li>';
	return $output;
}