<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="registerAdmin.php" method="post">
<table width="120" border="1">
  <tr>
    <td>name</td>
    <td><label for="textfield"></label>
      <input type="text" name="name" id="textfield" /></td>
  </tr>
  <tr>
    <td>surname</td>
    <td><label for="textfield2"></label>
      <input type="text" name="surname" id="textfield2" /></td>
  </tr>
  <tr>
    <td>email</td>
    <td><label for="textfield3"></label>
      <input type="text" name="email" id="textfield3" /></td>
  </tr>
  <tr>
    <td>password</td>
    <td><label for="textfield4"></label>
      <input type="text" name="password" id="textfield4" /></td>
  </tr>
  <tr>
    <td>address</td>
    <td><label for="textfield5"></label>
      <input type="text" name="address" id="textfield5" /></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" name="button" id="button" value="store" /></td>
    </tr>
</table>
</form>

<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$status = "Admin";

	$connect = new MySQLi('localhost','carsystem','carsystem','test');
	if(!$connect)
	{
		echo 'Database not connected';
		exit;
	}
	
	$userQuery = "INSERT INTO customer values('$name','$surname','$password','$email','$address','$status')";
	$userResults = $connect->query($userQuery);
	
	if(!$userResults)
	{
		echo 'Not stored';
	}
	else
	{
		echo 'Done!';	
	}
?>
</body>
</html>