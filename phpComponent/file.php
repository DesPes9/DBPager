<?php
	spl_autoload_register(function($class){
	require_once("pager/src/{$class}.php");});

	$obj = new DBPager\FilePager(
		new DBPager\PagesList(),
		'textdir/text.txt');

	foreach($obj->getItems() as $line){
		echo htmlspecialchars($line)."<br>";
	}
	
	echo "<p>$obj</p>";

 ?>