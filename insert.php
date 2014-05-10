<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$connect = mysql_connect("localhost","carsystem","carsystem");
$db = mysql_select_db("test",$connect);
if(!$db)
{
	echo mysql_error();
}
else
{
	$name = $_POST['name'];
	$price = $_POST['price'];
	$model = $_POST['model'];
	$desc = $_POST['desc'];
	$proImage = addslashes(file_get_contents($_FILES['pro_image']['tmp_name']));
	$image = getimagesize($_FILES['pro_image']['tmp_name']);
	
	$imgType = $image['mime'];
	
	$query = "INSERT INTO products VALUES(null,'$name','$model','$price','$desc','$proImage','$imgType')";
}

$results = mysql_query($query,$connect);
if($results)
{
	echo "Information stored successfully";
}
else
{
	echo mysql_error();
}

?>