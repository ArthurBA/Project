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
require('insertProduct.class.php');
$obj = new insertProduct();
?>
<html>
<head>
<title>Upload Product</title>
<link href="js/bootstrap.min.js" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome <?php echo $username;?> <a href="logout.php"> | Logout</a></td>
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
    </td>
    <td width="867" style="padding:15px 15px 15px 15px">
    <b>
    <p><h3>Store Car's</h3></p></b><br/>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    	<table width="527" >
  <tr>
    <td width="152" height="42">Car Name:</td>
    <td width="363">
    <input class='form-control' type="text" name="name" id="textfield" placeholder = 'Toyota'/>
    </td>
  </tr>
  <tr>
    <td height="46">Car Price:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type="text" name="price" id="textfield" placeholder = 'R120,124.45'>
    </td>
  </tr>
  <tr>
    <td height="46">Model:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type="text" name="model" id="textfield" placeholder = '2001'>
    </td>
  </tr>
  <tr>
    <td height="98">Car Description:</td>
    <td><label for="textarea"></label>
      <textarea class='form-control' name="desc" id="desc" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="46">Upload Car Image:</td>
    <td>
    <div>
    	<input class='form-control' type="hidden" name = "MAX_FILE_SIZE" value="1000000"/>
        <input class='form-control' type="file" name="pro_image" id="userfile" placeholder = 'Runx.jpg'/>
    </div>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input class='form-control btn btn-success' type='submit' name='upload' id='button' value='Upload'></td>
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
ini_set('display_errors',1);
if(isset($_POST['upload']))
{
	
		$name = strtolower($_POST['name']);
		$price = $_POST['price'];
		$model = $_POST['model'];
		$desc = $_POST['desc'];
		
		$obj->insertPro($name,$model,$price,$desc);
}
?>
</body>
</html>