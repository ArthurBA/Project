<html>
<head>
<title>Update Product</title>
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
    <td width="867">
    <b>
    <p><h3>Update</h3>
    </p></b><br/>
    <form action="" method="post">
    	<table width="527" >
		  <?php
			$connect = new MySQLi("localhost","carsystem","carsystem","test");
			
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
			echo'<form method="post">';
			echo "<table border='1'>";
			while($row = $res->fetch_assoc())
			{	
				
				echo "ID: ".$row['pro_id']." </br>";
				echo "Car Name: <input name=".$row['pro_name']." value =".$row['name']."></br>";
				echo "Car Model: <input name=".$row['pro_name']." value =".$row['name']."></br>";
				echo "Car Price: <input name=".$row['pro_name']." value =".$row['name']."></br>";
				echo "Car Description: <input name=".$row['pro_name']." value =".$row['name']."></br>";	
				
			}
			echo "</table>";
			echo "<input type='submit' name='button' id='button' value='Update'>";
			echo "</form>";
        ?>
  </table>
    </form>
   <br/>
   <br/>
   <br/>
   <br/>
  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>
</body>
</html>