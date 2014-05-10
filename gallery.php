<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();  
	
?>
<html>
<head>
<title>Car Distribution | Gallery</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFCC33">Welcome to Car Distribution site. | <b><a href="register.php">Register here</a></b> | <b><a href="search.php">Search for Cars</a></b>
    </td>
  </tr>
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('sideBar.php'); ?>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
       <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
       <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
       <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
    </td>
    <td width="867" style="padding:10px 10px 10px 10px">
<?php    
$connect = mysql_connect("localhost","carsystem","carsystem");
$db = mysql_select_db("Cars",$connect);
if(!$db)
{
	echo mysql_error();
}

$info = $_GET['pro_id'];
$query = "SELECT * FROM products";
$results = mysql_query("$query",$connect);
if($results)
{
	while($row = mysql_fetch_array($results))
	{
		echo'<img src=viewGallery.php?pro_id='.$row['pro_id'].' width=300 height=100/>';
		echo'</br>';
		echo'<hr color="#333333">';		
	}
}
?>   
    
      
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>


</body>
</html>