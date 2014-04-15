<html>
<head>
<title>Delete Product</title>
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
    </td>
    <td width="867">
    <b><p><h3>Delete Car Information</h3></p></b><br/>
    <form action="orderRespond.php" method="post" enctype="multipart/form-data">
    	<table width="527" >
  <tr>
    <td width="200" height="42">Car Reference Number:</td>
    <td width="315">
    <input class='form-control' type="text" name="refNum" id="textfield" placeholder = 'ref123'/>
    </td>
  </tr>
  <tr>
    <td colspan="2"><input class='form-control btn btn-success' type='submit' name='button' id='button' value='Delete'></td>
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


</body>
</html>