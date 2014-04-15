<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
$connect = mysql_connect("localhost","carsystem","carsystem");
$db = mysql_select_db("test",$connect);
if(!$db)
{
	echo mysql_error();
}

$info = $_GET['ano'];
$query = "SELECT * FROM products";
$results = mysql_query("$query",$connect);
if($results)
{
	while($row = mysql_fetch_array($results))
	{
		echo '<table width="120" border="1">';
		echo '<tr>';
		echo' <td>'.$row['pro_name'].'</br>'.$row['pro_model'].'</br>'.$row['pro_price'].'</br>'.$row['pro_desc'].'</br><img src=view.php?ano='.$row['pro_image'].' width=300 height=100/></td>';
		echo' <td>&nbsp;</td>';
		echo' <td>&nbsp;</td>';
		echo' </tr>';
		echo'</table>';

			
	}
}
?> 