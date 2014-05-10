<?php 
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();  
	$email = $_SESSION['email'];
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
<title>Car Distribution | Profile</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#FFCC33">Welcome <?php echo $username  ?> <a href="logout.php"> | Logout</a>
    </td>
  </tr>
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('sideBar2.php'); ?>
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
			$connect = new MySQLi("localhost","carsystem","carsystem","Cars");
			
			
			$sql = "SELECT * FROM users WHERE email='$email'";
			$res = $connect->query($sql);
			$affectedRows = $res->num_rows;
			echo'<form method="post" action="userProfile.php" style="padding:15px 15px 15px 15px" class="form">';
		
			while($row = $res->fetch_assoc())
			{	
				$name = $row['name'];
				$surname = $row['surname'];
				$address = $row['address'];
				$email = $row['email'];
				$password = $row['password'];
				
				echo "<b><h2>Update Your Profile</h2></b>";
				echo "</br>";
				echo "</br>";
				echo "<b>Name:</b> <input class='form-control' name=".$name." value =".$name.">";
				echo "</br>";
				echo "<b>Surname:</b> <input class='form-control'  name=".$surname." value =".$surname.">";
				echo "</br>";
				echo "<b>Address:</b> <textarea class='form-control' rows='5'  name=".$address." >".$address." </textarea>";
				echo "</br>";
				echo "Password: <input class='form-control' name=".$password." value =".$password.">";	
				echo "</br>";
			}
			
			echo "<input type='submit' name='button' id='button' value='Update Profile' class='form-control btn btn-success'>";
			echo '</form>';
			
			if(isset($_POST['button']))
			{
				require('connect.php');
				$sql_1= "UPDATE users SET name='$name',surname='$surname',password='$password', email='$email',address='$address' WHERE email='$email'";
				$query_1 = mysql_query($sql_1);
				if($query_1)
				{
					print '<script type="text/javascript">';
					print 'alert("Profile Successfully Updated.")';
					print '</script>';
					exit;
				}
				else
				{
					
					print '<script type="text/javascript">';
					print 'alert("Profile Update Failed.")';
					print '</script>';
					exit;
				}
			}
    
?>      
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>
</body>
</html>