<html>
<head>
<title>Make Order</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
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
    <form name="form1" method="post" action="register.php" class"form">
    <table width="460">
      <td width="452">
      </br>
      <table width="359">
        <tr>
          <td width="349"><b>Enter email:</b>
            <input class='form-control' type='text' name='name' id='textfield' placeholder='John'></td>
        </tr>
        <tr>
          <td><br/><b>Delivary Option:</b>
           <select class='form-control' name="select" id="select">
           <option value = "weDeliver" name = "weDeliver">Want you to deliver my car</option>
           <option value = "collect" name = "collect">I to come collect my car</option>
           
      </select>
           </td>
        </tr>
          <tr>
          <td><br/><b>Payment Period:</b>
           <select class='form-control' name="payment" id="select">
           <option value = "cash" name = "cash">Cash</option>
           <option value = "two" name = "two">Two</option>
           <option value = "four" name = "four">Four</option>
           <option value = "five" name = "five">Five</option>
      </select>
           </td>
        </tr>
          <tr>
          <td><br/><b>Car reference number:</b>
            <label for="textfield7"></label>
            <input class='form-control' type="password" name="reference" id="textfield6" placeholder='ref123'></td>
        </tr>
        <tr>
          <td><br/><b>Enter SA ID Number:</b>
            <label for="textfield3"></label>
            <input class='form-control' type="text" name="idNum" id="textfield3" placeholder='1234567891011'></td>
          </tr>
        
        <tr>
          <td><br/><b>Enter Cell Number:</b>
            <label for="textfield3"></label>
            <input class='form-control' type="text" name="cellNum" id="textfield3" placeholder='0785197250'></td>
          </tr>
          <tr>
          <td><br/><b>Enter Telephone Number:</b>
            <label for="textfield3"></label>
            <input class='form-control' type="text" name="telNum" id="textfield3" placeholder='0187873349'></td>
          </tr>
        <tr>
          <td><br/><b>Enter Password:</b>
            <label for="textfield5"></label>
            <input class='form-control' type="password" name="password" id="textfield5" placeholder='10111'></td>
          </tr>
        <tr>
          <td><br/><b>Confirm Password:</b>
            <label for="textfield6"></label>
            <input class='form-control' type="password" name="cPassword" id="textfield6" placeholder='10111'></td>
          </tr>
           <td colspan="2"><input class='form-control btn btn-success' type='submit' name='button' id='button' value='Respond'></td>
  </tr>
        </table>
      </td>
    </table>
    </form>
    <p></p>
    <br/>
    <p align="center"><a href="home.php">Home</a> | <a href="gallery.php">Car Gallery</a> | <a href="aboutUs.php">About Us</a> | <a href="contactUs.php">Contact Us</a></p>
  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>
<?php	
	if(($name =$_POST['name']) != "" && ($surname =$_POST['surname'])!= " ")
	{
		if(($idNum =$_POST['idNum']) != " ")
		{
			if(($cellNum =$_POST['cellNum']) && ($telNum =$_POST['telNum']) != "" )
			{
				if(($address =$_POST['address']) != "" && ($email =$_POST['email']) != "")
				{
					if(($password =$_POST['password']) !="" && ($cPassword =$_POST['cPassword'])!= "")
					{
						if($password == $cPassword)
						{
							$connect = new MySQLi('localhost','carsystem','carsystem','Member');
							if(!$connect)
							{
								echo'Database is not connected';
								exit;
							}
							
								$query = "INSERT INTO customer values('".$email."','".$password."','".$name."','".$surname."','".$idNum."','".$cellNum."','".$telNum."','".$address."')";
							
							$results = $connect->query($query);
							if(!$results)
							{
								echo'Submission not successfull';
								$_POST['email'] = $email;
								exit;
							}
							
							$connect->affected_rows."member(s) inserted";
							echo date('H:i jS F Y')."</br>";
							
							//echo require('index.php');
						}
					}
				}
			}
			
		}
	}
?>

</body>
</html>