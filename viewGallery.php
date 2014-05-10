<?php
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	$connect = mysql_connect("localhost","carsystem","carsystem");
	$db = mysql_select_db("Cars",$connect);
	if(!$db)
	{
		echo mysql_error();
	}
	
	$info = $_GET['pro_id'];
	$query = "SELECT pro_image,pro_aphototype FROM products WHERE pro_id=$info";
	$results = mysql_query("$query",$connect);
	if($results)
	{
		$row = mysql_fetch_array($results);
		$type = "content-type: ".$row['pro_aphototype'];
		header($type);
		echo $row['pro_image'];
	}
	else
	{
		echo mysql_error();	
	}
?>