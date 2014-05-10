<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
?>
<html>
<head>
<title>Car Distribution | Forgot Password</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
   <tr>
    <td colspan="2" align="center" bgcolor="#FFCC33">Welcome to Car Distribution site. | <b><a href="register.php">Register here</a></b></td>
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
    </td>
    <td width="867">
    <i>
    <p style="color:#F00">Please make sure that you enter correct name and email address</p></i>
    <?php echo $link?>
    <form name="form1" method="post" action="forgotPass.php" class"form" style="padding:15px 15px 15px 15px" >
    <table width="327">
    <td width="319">
      </br>
      <p><label id="textfield">Enter Your Name:
      <input class='form-control' type='text' name='name' id='textfield'></label></p>
  	   <br/>
      <p><label id="textfield2">Enter Email:
      <input class='form-control' type='text' name='email' id='textfield2'></label></p>
      <table width="100" border="2" height="30">
  <tr><h5 style="color:#F00">Unique Code:</h5>
    <td> 
	<?php
		$rand = substr(md5(time()),rand(0,26),6);
		echo "<p style='color:blue' align='center'>".$rand."</p>";
	?>
	 </td>
  </tr>
</table>
      <br/>
       <p><label id="textfield3">Enter Above Unique Code:
      <input class='form-control' type='text' name='code' id='textfield3'></label></p>
      <br/>
      <p><label id="textfield4">Required password:
      <input class='form-control' type='text' name='password' id='textfield4'></label></p>
      <br/>
      <p><label id="button">
      <input class='form-control btn btn-success' type='submit' name='forgot' id='button' value='Submit'></p>
      <br/>
	</td>
    <tr>
    	<td>
        <?php
				if(isset($_POST['forgot']))
				{
					$email = $_POST['email'];
					$name = $_POST['name'];
					$unique = $_POST['code'];
					$pass = $_POST['password'];
					if($email)
					{
						if($name)
						{
							if($unique = $rand)
							{
								if($pass)
								{
									require('connect.php');
											
									$query = mysql_query("SELECT * FROM users WHERE email='$email' AND name='$name'");
									$numrows = mysql_num_rows($query);
									if($numrows == 1)
									{
										$row = mysql_fetch_assoc($query);
										$query_2 = mysql_query("UPDATE users SET password='$pass' WHERE email='$email'");
										if($query_2)
										{
											print '<script type="text/javascript">';
											print 'alert("Password was change.")';
											print '</script>';
											echo '<a href="index.php">Click here to login</a>';
											$link = '<a href="index.php">Click here to login</a>';
											exit;
										}
										else
										{
											echo"Password was not changed.";
											exit;
										}
										
									}
									else
									{
										echo "<p style='color:red'>".'User was not found! Please make all input is correct.'."</p>";
										exit;
									}
											
									mysql_close();
								}
								else
								{
									echo "<p style='color:red'>".'Required password was not entered.'."</p>";
									exit;
								}
							}
							else
							{
								echo "<p style='color:red'>".'Incorrected unique code.'."</p>";
								exit;
							}
						}
						else
						{
							echo "<p style='color:red'>".'Please enter name.'."</p>";
							exit;
						}
					}
					else
					{
						echo "<p style='color:red'>".'Please enter your email.'."</p>";
						exit;
					}							
				}					
		?>    
        </td>   
    </table>
    </form>
  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php include('footer.php'); ?></td>
  </tr>
</table>
</body>
</html>