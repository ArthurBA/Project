<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
if($username != "" && $password != "")
{
	$connect = new MySQLi('localhost','carsystem','carsystem','test');
	if(!$connect)
	{
		echo 'Database not connected';
		exit;
	}
	
	$Query = "SELECT * FROM customer WHERE email='$username' AND password='$password'";
	$Results = $connect->query($Query);
	$Count = mysqli_num_rows($Results);
	
	
	if($Count = 1 )
	{
		
		$_SESSION['username'] = $username;
		header("Location: viewOrder.php");
		
	}
	else
	{
		print '<script type="text/javascript">';
		print 'alert("You are not logged in.")';
		print '</script>';
		exit;
	}	
}
?>
<html>
<head>
<title>Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
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
    </td>
    <td width="867">
    <i>
    <p style="color:#F00">Please make sure that you enter correct email and password</p></i>
    <form name="form1" method="post" action="login.php" class"form">
    <table width="327">
    <td width="319">
      </br>
      <p><label>Enter email:</label><input class='form-control' type='text' name='username' id='textfield' placeholder = 'email@example.com'></p>
  	<br/>
      <p><label>Enter password</label><input class='form-control' type='password' name='password' id='textfield2' placeholder = 'password'>
      <input class='form-control btn btn-success' type='submit' name='button' id='button' value='Login'></p>
      <br/>
      <a href="forgotPassword.php">Forgot Password?</a><br/>
      <a href="register.php">Sign Up</a>
	</td>
    </table>
    </form>
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