<?php 
	spl_autoload_register(function($class){
	require_once("pager/src/{$class}.php");});

	try{
		$pdo = new PDO(
			'mysql:host=localhost;dbname=citys',
			'root',
			'',
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		$obj = new DBPager\PdoPager(new DBPager\ItemsRange(),$pdo,'citys');


		foreach($obj->getItems() as $citys){
			echo htmlspecialchars($citys['nameCity'])."<br>";
		}
		echo "<p>$obj</p>";

	} catch(PDOException $e){
		echo "Невозможно установить соединение с базой данных". $e->getMessage();
	}
 ?>