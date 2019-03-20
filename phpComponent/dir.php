<?php 
	spl_autoload_register(function($class){
	require_once("pager/src/{$class}.php");});
	
	$obj=new DBPager\DirPager(
	new DBPager\PagesList(),
	'photos',
	3,
	2);
	
	foreach($obj->getItems() as $img){
		echo "<img src='$img' />";
	}
	
	echo "<p>$obj</p>";

 ?>