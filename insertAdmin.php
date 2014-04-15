<html>
<head>
<title>Register Admin</title>
<link href="js/bootstrap.min.js" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome <?php $_SESSION['admin'];?> <a href="logout.php"> | Logout</a></td>
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
    </td>
    <td width="867">
    <b>
    <p><h3>Register Administrator's</h3></p></b><br/>
    <form action="insertAdmin.php" method="post">
    	<table width="527" >
  <tr>
    <td width="152" height="42">Name:</td>
    <td width="363">
    <input class='form-control' type='text' name='name' id='textfield' placeholder = 'Frekkie'/>
    </td>
  </tr>
  <tr>
    <td height="46">Surname:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type='text' name='surname' id='textfield' placeholder = 'Admin'>
    </td>
  </tr>
  <tr>
    <td height="46">Email:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type='text' name='email' id='textfield' placeholder = 'email@example.co.za'>
    </td>
  </tr>
  <tr>
    <td height="46">Password:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type='password' name='password' id='textfield' placeholder = '10111'>
    </td>
  </tr>
  <tr>
    <td height="46">Confirm Password:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type='password' name='cPassword' id="textfield" placeholder = '10111'>
    </td>
  </tr>
  </tr>
  <tr>
    <td colspan="2"><input class='form-control btn btn-success' type='submit' name='button' id='button' value='Register'></td>
  </tr>
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
<?php
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$connect = new MySQLi('localhost','carsystem','carsystem','test');
	if(!$connect)
	{
		print '<script type="text/javascript">';
		print 'alert("Database not connected")';
		print '</script>';
		exit();
	}
	
	if(!$name)
	{
		print '<script type="text/javascript">';
		print 'alert("Name was not entered")';
		print '</script>';
		exit();
	}
							
	$query = "INSERT INTO admin values('".$email."','".$password."','".$name."','".$surname."')";
							
	$results = $connect->query($query);
	if(!$results)
	{
		print '<script type="text/javascript">';
		print 'alert("Registration was not successful. Please try again")';
		print '</script>';
		exit();
	}
	else
	{
		print '<script type="text/javascript">';
		print 'alert("Registration successful.")';
		print '</script>';
		exit();
		header("Location: insertMember.php");
	}
?>
</body>
</html>