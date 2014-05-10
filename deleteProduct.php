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
	require('connect.php');
	
	if(isset($_GET['page']))
	{
		$pages = array("delete","delete_product");
		if(in_array($_GET['page'],$pages))
		{
			$_page = $_GET['page'];
			
		}
		else
		{
			$_page = "delete";
		}
	}
	else
	{
		$_page = "delete";	
	}
?>
<html>
<head>
<title>Car Distribution | Delete Product</title>
<link href="js/bootstrap.min.js" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href = "style.css"/>
</head>
<body>
<table width="900" border="1" align="center" style="border-style:outset">
  <tr>
    <td colspan="2"><?php require('header.php');?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33" align="center">Welcome <?php echo $username?> <a href="logout.php"> | Logout</a></td>
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
    <td width="867" style="padding:10px 10px 10px 10px;">
    <b><p><h3>Delete Car Information</h3></p></b>
        <div id = "container">
        <div id="main">
        
        	<?php require($_page.".php"); ?>
            
      </div><!--end of main-->
        
        <div id="sideBar" style="padding:5px 1px 35px 35px">
        <h1><u>Seletcted</u></h1>
        <?php	
           if(isset($_SESSION['cart']))
		   {
				$sql = "SELECT * FROM products WHERE pro_id IN(";
				foreach($_SESSION['cart'] as $id => $value)
		   		{
					$sql.=$id.",";
				}
				$sql = substr($sql, 0, -1).") ORDER BY pro_name ASC";
				$query = mysql_query($sql);
				
				while($row = mysql_fetch_array($query))
				{
					?>
                    
                    <p><?php echo $row['pro_name'] ?></p>
                    
                   <?php
					
				}
				
				?>
                <hr color="#000000"/>
                <a href="deleteProduct.php?page=delete_product" class='form-1 btn btn-success'>Click Here To Go And Delete</a>
                
                <?php
		   }
		   else
		   {
			   echo '<b>The are no items selected. Select the item(s) to delete.</b>';
		   }
        ?>
        </div><!--end of sidebar-->
</div>

  </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFCC33"><?php require('footer.php'); ?></td>
  </tr>
</table>
<p></p>
<p></p>
<p></p>
</body>
</html>