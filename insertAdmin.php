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
require('insertAdmin.class.php');
$obj = new insertAdmin();
?>
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
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome | <?php $username ?> <a href="logout.php"> | Logout</a></td>
  </tr>
  <tr>
    <td width="17" bgcolor="#FFCC33"><?php require('supAdminSidebar.php'); ?>
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
    <td width="867" style="padding:15px 15px 15px 15px">
    <b>
    <p><h3>Register Administrator's</h3></p></b><br/>
    <form action="insertAdmin.php" method="post">
    	<table width="527" >
  <tr>
    <td width="152" height="42">Name:</td>
    <td width="363">
    <input class='form-control' type='text' name='name' id='textfield'/>
    </td>
  </tr>
  <tr>
    <td height="46">Surname:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type='text' name='surname' id='textfield' >
    </td>
  </tr>
  <tr>
    <td height="46">Email:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type='text' name='email' id='textfield' >
    </td>
  </tr>
    <tr>
    <td height="46">Address:</td>
    <td><label for="textfield"></label>
      <textarea class='form-control' cols="20" rows="10" type='text' name='address' id='textfield'></textarea>
    </td>
  </tr>
  <tr>
    <td height="46">Password:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type='password' name='password' id='textfield' >
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
if(isset($_POST['button']))
{
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cPassword = $_POST['cPassword'];
	$address = $_POST['address'];
	
	$obj->insert($name,$surname,$email,$password,$cPassword,$address);
}
?>
</body>
</html>