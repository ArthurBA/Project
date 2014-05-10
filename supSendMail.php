<?php
ini_set("smtp_port","braingelhaus.com");
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$username = $_SESSION['username'];
if(!$username)
{	
	echo "Section has expired";
	header("Location: index.php");
	exit;
}

$custEmail = $_SESSION['cust_email'];


$name = $_POST['name'];
$subject = "[From Car Distributions] Order approval letter";
$email = $_POST['email'];
$status = $_POST['status'];
$message = <<<EMAIL
Dear Sir/Madam

This is a status letter for the order to did with us.

We would kindly like to confirm that your order was $status.
It was approved by $name.
For more information, please contact Jack Baile:

CONTACT DETAILS:
Tel Number: 012 787 3349
Email: jackbail@carDistribution.co.za


From: carDistribution@sacars.co.za
EMAIL;
$header = 'From: $email';
if(isset($_POST['button']))
{
	mail($email,$subject,$message,$header);
	//$results = "Email successfully sent";
	print '<script type="text/javascript">';
	print 'alert("Email successfully sent.")';
	print '</script>';

}
else
{
	print '<script type="text/javascript">';
	print 'alert("Email was not send sent.")';
	print '</script>';
	
}
?>
<html>
<head>
<title>Car Distribution | Send Mail</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<table width="900" border="1" align="center">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
    <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome <?php echo $username?> <a href="logout.php"> | Logout</a></td>
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
    </td>
    <td width="867">
    <i>
    <p style="color:#F00">Please make sure that all data fields are provided</p></i>
    <p style="color:#0F0"><?php echo $results?></p>
    <form name="form1" method="post" action="" class"form" style="padding:15px 15px 15px 15px">
    <table width="460" style="padding:10px 10px 10px 10px">
      <td width="452">
      </br>
      <table width="359" >
        <tr>
          <td width="349">
          <label for="textfield"><b>Name:</b></label>
          	<input class='form-control' type='text' name='name' id='textfield' ></td>
        </tr>
        <tr>
          <td><br/>
            <label for="textfield2"><b>Email:</b></label>
            <input class='form-control' name="email" type="text" size="4" value="<?php echo $custEmail ?>"/></td>
          </tr>
        <tr>
          <td><br/>
            <label for="textfield3"><b>Order Approval:</b></label>
            <select name="status" class='form-control' id="textfield3">
            	<option value="approved">Approve</option>
                <option value="declined">Decline</option>
            </select></td>
          </tr>
        <tr>
          <td><br/><input class='form-control btn btn-success' type="submit" name="button" id="button" value="Send Mail"></td>
        </tr>
        </table>
      </td>
    </table>
    </form>
  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>
</body>
</html>