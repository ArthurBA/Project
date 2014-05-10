<?php
class insertProduct
{
	private $name;
	private $model;
	private $price;
	private $desc;
	
	public function insertPro($name,$model,$price,$desc)
	{
		require('connect.php');
		$refNum = substr(md5(time()),rand(0,26),6);
		
		$proImage = addslashes(file_get_contents($_FILES['pro_image']['tmp_name']));
		$image = getimagesize($_FILES['pro_image']['tmp_name']);
		$imgType = $image['mime'];
		
		$query = mysql_query("INSERT INTO products VALUES(null,'$name','$model','$price','$desc','$proImage','$imgType','$refNum')");
		if($query)
		{
			print '<script type="text/javascript">';
			print 'alert("Product stored successfully.")';
			print '</script>';
			exit;
		}
		else
		{
			print '<script type="text/javascript">';
			print 'alert("Product was not successfully stored.")';
			print '</script>';
			exit;
		}
	}
}
?>