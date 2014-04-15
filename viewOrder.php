<?php session_start();  ?>
<html>
<head>
<title>View Order</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome <?php $_SESSION['username'];?> <a href="logout.php"> | Logout</a></td>
  </tr>
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('adminSideBar.php'); ?>
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
    <td width="867">
    <b>
    <p><h3>Client Order Request's</h3></p></b>
    <p>&nbsp;</p>
    <p>
	<?php
	$connect = new MySQLi('localhost','carsystem','carsystem','test');
	if(!$connect)
	{
		echo 'Database not connected';
		exit;
	}
	
	$query = "SELECT * FROM orders";
	
	$results = $connect->query($query);
	if($results)
	{
		echo '<form action="orderRespond.php" method="post" class"form">';
		echo $query.'<input name="radio" type="radio" value="" checked>';
		echo '</br>';
		echo '<input class="form-control btn btn-success name="submit" type="button" value="Respond">';
		echo '</form>';
	}
	
	?>
	</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>


</body>
</html>