<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$username = $_SESSION['username'];
if(!$username)
{	
	echo "Section has expired";
	header("Location: index.php");
	exit;
}
?>
<html>
<head>
<title>Car Distribution | Update Product</title>
<link href="js/bootstrap.min.js" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href = "style.css"/>
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome  <?php echo $username?> <a href="logout.php"> | Logout</a></td>
  </tr>
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('supAdminSidebar.php'); ?>
    <br/>
    <br/>
    <br/>
    </td>
    <td width="867">
    <b>
    <p><h3>Update</h3>
    </p></b><br/>
    <form action="" method="post" >
    	<table width="527" >
		  <?php
			$connect = new MySQLi("localhost","carsystem","carsystem","Cars");
			
			if(!$connect)
			{
					print '<script type="text/javascript">';
					print 'alert("Database is not connected. Please try again later.")';
					print '</script>';
					exit;
			}
			
			$sql = "SELECT * FROM products";
			$res = $connect->query($sql);
			$affectedRows = $res->num_rows;
			echo'<form method="post" action="updateProduct.php" style="padding:15px 15px 15px 15px">';
			echo "<table style='padding:10px 10px 10px 10px'>";
			while($row = $res->fetch_assoc())
			{	
				$id = $row['pro_id'];
				$name = $row['pro_name'];
				$model = $row['pro_model'];
				$price = $row['pro_price'];
				$desc = $row['pro_desc'];
				
				echo "<tr>";
				echo "<tr>";
				echo "<td><b>ID: ".$id." </b></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>Car Name: <input name=".$name." value =".$name."></td>";
				echo "</tr>";
				echo "<td>Car Model: <input name=".$model." value =".$model."></td>";
				echo "<td>Car Price: <input name=".$price." value =".$price."></td>";
				echo "<td>Car Description: <textarea col='30' row='25' name=".$desc."> '".$desc."'</textarea><td>";	
				echo "</tr>";
			}
			echo "</table>";
			echo "<input type='submit' name='button' id='button' value='Update'>";
			echo '</form>';
			
			if(isset($_POST['button']))
			{
				require('connect.php');
				$sql= "UPDATE products SET pro_name='$name',pro_model='$model',pro_price='$price',pro_desc='$desc' WHERE pro_id=$id";
				$query = mysql_query($sql);
				if($query)
				{
					print '<script type="text/javascript">';
					print 'alert("Successfully Updated.")';
					print '</script>';
					exit;
				}
				else
				{
					
					print '<script type="text/javascript">';
					print 'alert("Not successfully updated.")';
					print '</script>';
					exit;
				}
			}
        ?>
  </table>
    </form>
  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>
</body>
</html>