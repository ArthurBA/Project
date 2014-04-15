<html>
<head>
<title>Respond to Order</title>
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
    <p><h3>Respond to Customer Request's</h3></p></b><br/>
    <form action="orderRespond.php" method="post">
    	<table width="527" >
  <tr>
    <td width="108" height="42">Select result:</td>
    <td width="407"><label for="select"></label>
      <select class='form-control' name="select" id="select">
      <option value = "approved" name = "approved">Approved</option>
      <option value = "declined" name = "declined">Declined</option>
      </select></td>
  </tr>
  <tr>
    <td height="98">Order Description:</td>
    <td><label for="textarea"></label>
      <textarea class='form-control' name="desc" id="textarea" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td height="46">Enter Admin Name:</td>
    <td><label for="textfield"></label>
      <input class='form-control' type="text" name="name" id="textfield"></td>
  </tr>
  <tr>
    <td colspan="2"><input class='form-control btn btn-success' type='submit' name='button' id='button' value='Respond'></td>
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

	// should update the order table
?>
</body>
</html>