<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
require('login.class.php');
$obj = new Login();
?>
<html>
<head>
<title>Car Distribution | Login</title>
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
    </td>
    <td width="867">
    <i>
    <p style="color:#F00">Please make sure that you enter correct email and password</p></i>
    <form name="form1" method="post" action="index.php" class"form" style="padding:15px 15px 15px 15px" >
    <table width="327">
    <td width="319">
      </br>
      <p><label>Enter email:</label>
      <input class='form-control' type='text' name='email' id='textfield' placeholder = 'email@example.com'></p>
  	   <br/>
      <p><label>Enter password</label>
      <input class='form-control' type='password' name='password' id='textfield2' placeholder = 'password'>
      <br/>
      <input class='form-control btn btn-success' type='submit' name='login' id='button' value='Login'></p>
      <br/>
	</td>
    <tr>
    	<td>
    		<?php
				if(isset($_POST['login']))
				{
					$email = $_POST['email'];
					$password = $_POST['password'];
					
					$obj->userLogin($email,$password);					
				}					
		   ?>    
    </table>
    </form>
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